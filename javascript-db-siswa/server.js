const express = require("express");
const mysql = require("mysql");
const bodyParser = require("body-parser");

const app = express();

app.use(bodyParser.urlencoded({ extended: true }));

app.set("view engine", "ejs");
app.set("views", "views");

const db = mysql.createConnection({
    host: "localhost",
    database: "siswa",
    user: "root",
    password: ""
});

db.connect((err) => {
    if (err) throw err;
    console.log("database connected...");

    app.get("/", (req, res) => {
        const sql = "SELECT * FROM users";
        db.query(sql, (err, result) => {
            if (err) throw err;
            const users = JSON.parse(JSON.stringify(result));
            res.render("index", { users: users, title: "Daftar Siswa", error: null });
        });
    });

    app.post("/tambah", (req, res) => {
        const { nama, kelas } = req.body;
        if (!nama.trim() || !kelas.trim()) {
            const sqlSelect = "SELECT * FROM users";
            db.query(sqlSelect, (err, result) => {
                if (err) throw err;
                const users = JSON.parse(JSON.stringify(result));
                res.render("index", { users: users, title: "Daftar Siswa", error: "Nama dan Kelas harus diisi!" });
            });
        } else {
            const insertSql = "INSERT INTO users (nama, kelas) VALUES (?, ?)";
            db.query(insertSql, [nama, kelas], (err, result) => {
                if (err) throw err;
                res.redirect("/");
            });
        }
    });

    app.post("/hapus", (req, res) => {
        const id = req.body.id;
        const deleteSql = `DELETE FROM users WHERE id = ?`;
        db.query(deleteSql, [id], (err, result) => {
            if (err) throw err;
            console.log("Number of records deleted: " + result.affectedRows);
            res.redirect("/");
        });
    });

    app.post("/update", (req, res) => {
        const { id, nama, kelas } = req.body;
        if (!nama.trim() || !kelas.trim()) {
            console.log("Nama dan Kelas harus diisi saat update!");
            res.redirect("/");
        } else {
            const checkSql = "SELECT * FROM users WHERE id = ?";
            db.query(checkSql, [id], (err, result) => {
                if (err) throw err;
                const user = result[0];
                if (user.nama !== nama || user.kelas !== kelas) {
                    const updateSql = "UPDATE users SET nama = ?, kelas = ? WHERE id = ?";
                    db.query(updateSql, [nama, kelas, id], (err, result) => {
                        if (err) throw err;
                        console.log("Updated records: " + result.affectedRows);
                        res.redirect("/");
                    });
                } else {
                    // Mengambil semua user untuk ditampilkan kembali di halaman
                    const sqlSelect = "SELECT * FROM users";
                    db.query(sqlSelect, (err, result) => {
                        if (err) throw err;
                        const users = JSON.parse(JSON.stringify(result));
                        // Mengirimkan pesan 'tidak ada perubahan data' ke EJS
                        res.render("index", { users: users, title: "Daftar Siswa", error: "Tidak ada perubahan pada data." });
                    });
                }
            });
        }
    });        
});

app.listen(8000, () => {
    console.log("Server ready");
});
