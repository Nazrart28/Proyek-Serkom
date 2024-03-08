<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
<!DOCTYPE html>
<html>

<body>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <tr style=" justify-content:left; align-items:left; height: 100px;">
                        <h1>Selamat Datang di Website PBL</h1>
                    </tr>
                    <div style="display:flex; justify-content:right; align-items:right; height: 100px;">
                        <img src="dist/img/home.png" alt="Gambar" style="width: 20%;height: 100px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <table class="calendar">
                <thead>
                    <tr>
                        <th colspan="7">Mei 2023</th>
                    </tr>
                    <tr>
                        <th>Sun</th>
                        <th>Mon</th>
                        <th>Tue</th>
                        <th>Wed</th>
                        <th>Thu</th>
                        <th>Fri</th>
                        <th>Sat</th>
                    </tr>
                </thead>
                <tbody id="calendar-body"></tbody>
            </table>
        </div>
    </div>

    <script>
        // Get current date
        var currentDate = new Date();

        // Get first day of the month
        var firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);

        // Get last day of the month
        var lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);

        // Calculate number of weeks
        var numWeeks = Math.ceil((lastDay.getDate() - firstDay.getDate() + 1 + firstDay.getDay()) / 7);

        // Generate calendar table
        var tableBody = document.getElementById('calendar-body');
        var dayCount = 1;
        for (var i = 0; i < numWeeks; i++) {
            var row = document.createElement('tr');
            for (var j = 0; j < 7; j++) {
                var cell = document.createElement('td');
                if (i === 0 && j < firstDay.getDay()) {
                    cell.innerHTML = '';
                } else if (dayCount > lastDay.getDate()) {
                    cell.innerHTML = '';
                } else {
                    cell.innerHTML = dayCount;
                    if (currentDate.getFullYear() === firstDay.getFullYear() &&
                        currentDate.getMonth() === firstDay.getMonth() &&
                        dayCount === currentDate.getDate()) {
                        cell.className = 'today';
                    }
                    dayCount++;
                }
                row.appendChild(cell);
            }
            tableBody.appendChild(row);
        }
    </script>
</body>

<style>
    /* Calendar styles */
    table {
        border-collapse: collapse;
        margin-left: auto;
    }

    td {
        width: 40px;
        height: 40px;
        text-align: center;
        vertical-align: middle;
        border: 1px solid #ccc;
    }

    td:hover {
        background-color: #f2f2f2;
    }

    th {
        background-color: #E5E5E5;
        color: #4083E8;
        height: 40px;
        text-align: center;
        border: 1px solid #ccc;
    }

    /* Current date styles */
    .today {
        background-color: #0077cc;
        color: #fff;
    }
</style>

</html>
<?= $this->endSection(); ?>