<style>
</style>


<?
    foreach ($result as $row)
        {   ?>
            <h2>Параметры</h2>
            <table class="parameter1">
                <tr>
                    <td>Параметр 1<td>
                    <td><?echo $row['parameter_1'];?><td>
                </tr>
            </table>

            <h2>Комплектация</h2>
            <table>
                <?php foreach (explode(',', $row['complectation']) as $compect) { 
                    ?>
                    <tr>
                        <td><?echo $compect;?><td>
                    </tr>
                    <?}?>
            </table>
            <?
        }