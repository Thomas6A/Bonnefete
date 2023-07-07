<?php require_once 'Views/head.php'; ?>

<table class="table" style=" width: 70%; margin-left:20%; margin-bottom : 20% ; margin-right:10px">
    <tr>
        <th>Id</th>
        <th>Content</th>
        <th>Date</th>
    </tr>
    <?php foreach ($logs as $log) : ?>
        <tr>
            <td><?= $log->id_logs ?></td>
            <td><?= $log->content_logs ?></td>
            <td><?= $log->date_logs ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once 'Views/foot.php'; ?>