<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
<!DOCTYPE html>
<html>

<head>
    <title><?= $title ?></title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('gantt/codebase/dhtmlxgantt.css') ?>">
    <script type="text/javascript" src="<?= base_url('gantt/codebase/dhtmlxgantt.js') ?>"></script>
</head>

<body>
    <div id="gantt_here" style="width:100%; height:500px;"></div>
    <script type="text/javascript">
        gantt.config.xml_date = "%Y-%m-%d %H:%i:%s";
        gantt.init("gantt_here");
        gantt.load("<?= base_url('GanttChartController/get_data') ?>");
    </script>
    <script type="text/javascript">
        // inisialisasi Gantt chart...
        function onTaskUpdated(id, task) {
            $.ajax({
                url: '<?= base_url('ganttchart/update_task') ?>',
                type: 'POST',
                data: task,
                dataType: 'json',
                success: function(response) {
                    // tampilkan pesan sukses atau error...
                },
                error: function(xhr, status, error) {
                    // tampilkan pesan error...
                }
            });
        }
    </script>
</body>

</html>

<?= $this->endSection(); ?>