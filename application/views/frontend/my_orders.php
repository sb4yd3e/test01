<section id="content-wrapper">
    <section class="container_12 clearfix" id="product-detail">

        <div id="membber-form">
            <?php if (!$orders) { ?>
                <div id="empty">
                    No order history
                </div>
            <?php } else { ?>
                <div id="shiping_address">
                    <table class="table" id="table-history">
                        <thead>
                        <tr>
                            <th>วันที่</th>
                            <th>การสั่งซื้อ</th>
                            <th>จำนวน</th>
                            <th>ยอดชำระ</th>
                            <th>สถานะ</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($orders as $order) { ?>
                            <tr>
                                <td><?php echo date('d/m/Y', $order['at_date']); ?></td>
                                <td><a href="<?php echo base_url('order/view/' . $order['oid']); ?>"
                                       target="_blank">#<?php echo str_pad($order['oid'], 6, "0", STR_PAD_LEFT); ?></a>
                                </td>
                                <td><?php echo number_format($order['total_qty']); ?></td>
                                <td>
                                    <?php echo number_format($order['total_amount'],2); ?>
                                </td>
                                <td><?php echo order_status($order['order_status']); ?></td>
                                <td align="right">
                                    <?php if ($order['order_status'] == 'confirmed') { ?><a
                                        href="<?php echo base_url('order/confirm-payment/' . $order['oid']); ?>">
                                            [แจ้งการชำระเงิน] </a>
                                    <?php } ?>
                                    <?php if ($order['order_type'] == 'business') { ?><a
                                        href="<?php echo base_url('order/document/' . $order['oid']); ?>">
                                            [เอกสาร] </a>
                                    <?php } ?>
                                    <a href="<?php echo base_url('order/view/' . $order['oid']); ?>" target="_blank">[รายละเอียด]</a>
                                    <a href="<?php echo base_url('order/print/' . $order['oid']); ?>" target="_blank">[ใบสั่งซื้อ]</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
    </section>
</section>

<script>
    $(document).ready(function () {

    });
</script>