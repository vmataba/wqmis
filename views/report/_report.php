<table class="table table-bordered table-sm table-striped" id="reportSection">
    <tr>
        <th>Parameter</th>
        <th>Turbidity</th>
        <th>PH</th>
        <th>Conductivity</th>
        <th>Temperature</th>
        <th>Status</th>
        <th>Date</th>
    </tr>
    <tr>
        <th>Unit</th>
        <th>NTU</th>
        <th>moles/L</th>
        <th></th>
        <th>&deg;C</th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <th colspan="7">Sampling Point</th>
    </tr>

    <?php foreach ($qualities as $quality): ?>


        <tr>
            <td><?= $quality['vending_machine_id'] ?></td>
            <td><?= $quality['turbidity'] ?></td>
            <td><?= $quality['pH'] ?></td>
            <td><?= $quality['conductivity'] ?></td>
            <td><?= $quality['temperature'] ?></td>
            <td><?= $quality['status'] ?></td>
            <td><?= $quality['recieved_at'] ?></td>
        </tr>

    <?php endforeach; ?>

</table>


<script>
    document.getElementById('btnPrintReport').onclick = function () {
        window.print();
        //document.getElementById('reportSection').print();
    };
</script>