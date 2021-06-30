<h1>liste des absences  du semestre
    <?php
    use ism\lib\Session;
    echo Session::getSession("semestreCours"); ?></h1>
<table class="table mt-5 container table-bordered">
    <thead>
    <tr>
        <th>date</th>
        <th>cours</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($ac['data'] as  $info):?>
        <tr>
            <td><?= $info["dateAbsence"] ?></td>
            <td><?= $info["coursId"] ?></td>
        </tr>
    <?php  endforeach;?>


    </tbody>
</table>
