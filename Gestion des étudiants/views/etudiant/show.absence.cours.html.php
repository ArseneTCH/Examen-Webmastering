<h1>liste des absences du cours
    <?php
    use ism\lib\Session;
    echo Session::getSession("coursId"); ?></h1>
<table class="table mt-5 container table-bordered">
    <thead>
    <tr>
        <th>date</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($ac['data'] as  $info):?>
        <tr>
            <td><?= $info["dateAbsence"] ?></td>
        </tr>
    <?php  endforeach;?>


    </tbody>
</table>