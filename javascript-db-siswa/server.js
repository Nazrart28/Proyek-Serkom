const express = require("express");
const mysql = require("mysql");
const BodyParser = require("body-parser");

const app = express();

app.use(BodyParser.urlencoded({ extended: true }));

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

    const sql = "SELECT * FROM users";

    app.get("/", (req, res) => {
        db.query(sql, (err, result) => {
            if (err) throw err;
            const users = JSON.parse(JSON.stringify(result));
            res.render("index", { users: users, title: "daftar siswa" });
        });
    });

    app.post("/tambah", (req, res) => {
        const insertSql = `INSERT INTO users (nama, kelas) VALUES ('${req.body.nama}', '${req.body.kelas}');`;
        db.query(insertSql, (err, result) => {
            if (err) throw err;
            res.redirect("/");
        });
    });

    app.post("/hapus", (req, res) => {
        const id = req.body.id;
        const deleteSql = `DELETE FROM users WHERE id = ?`;
        db.query(deleteSql, [id], (err, result) => {
            if (err) throw err;
            res.redirect("/");
        });
    });
    
    app.post("/update", (req, res) => {
        const id = req.body.id;
        const nama = req.body.nama;
        const kelas = req.body.kelas;
        const updateSql = `UPDATE users SET nama = ?, kelas = ? WHERE id = ?`;
        db.query(updateSql, [nama, kelas, id], (err, result) => {
            if (err) throw err;
            console.log("Updated records: " + result.affectedRows);
            res.redirect("/");
        });
    });    
});

app.listen(8000, () => {
    console.log("server ready");
});
