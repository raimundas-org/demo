<h1>Orders</h1>

<?php if(count($dids) == 0): ?>
    No Data
<?php else: ?>

<table class="table">
    <tr>
        <th>#</th>
        <th>DID</th>
        <th>Country</th>
        <th>City</th>
        <th>DID Status</th>
        <th>DID Expire Date</th>
        <th>Order ID</th>
        <th>Order Status</th>
        <th>Mapping</th>
        <th>Setup Price (USD)</th>
        <th>Monthly Price (USD)</th>
        <th>Period</th>
        <th>Actions</th>
    </tr>
    <?php $i = 0;
    /** @var $did Didww\API2\DIDNumber */
    foreach($dids as $did): ?>
        <tr>
            <td><?= ++$i ?></td>
            <td><?= $did->getDidNumber() ?></td>
            <td><?= $did->getCountryName() ?></td>
            <td><?= $did->getCityName() ?></td>
            <td><?= $did->getDidStatus() ?></td>
            <td><?= $did->getDidExpireDateGmt() ?></td>
            <td><?= $did->getOrderId() ?></td>
            <td><?= $did->getOrderStatus() ?></td>
            <td><?= $did->getDidMappingFormat() ?></td>
            <td><?= $did->getDidSetup() ?></td>
            <td><?= $did->getDidMonthly() ?></td>
            <td><?= $did->getDidPeriod() ?></td>
            <td nowrap>
                <a href="index.php?controller=orders&action=renew&did_number=<?= $did->getDidNumber() ?>&customer_id=<?= $customer_id ?>">Renew</a><br>
                <a href="index.php?controller=mapping&action=add&did_number=<?= $did->getDidNumber() ?>&customer_id=<?= $customer_id ?>">Update Mapping</a><br>
                <a href="index.php?controller=call_history&did_number=<?= $did->getDidNumber() ?>&customer_id=<?= $customer_id ?>">Call History</a><br>
                <?php if($did->getDidStatus() == 1): ?>
                    <a href="index.php?controller=orders&action=cancel&did_number=<?= $did->getDidNumber() ?>&customer_id=<?= $customer_id ?>">Cancel</a>
                <?php else : if($did->getDidStatus() == -1): ?>
                    <a href="index.php?controller=orders&action=restore&did_number=<?= $did->getDidNumber() ?>&customer_id=<?= $customer_id ?>">Restore</a>
                <?php endif; endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php endif;