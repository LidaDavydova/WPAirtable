
<style>
</style>


<?
    foreach ($result as $row)
        {   ?>
            <table class="parameter2">
                <tr>
                    <td>Параметр 2<td>
                    <td><?echo $row['parameter_2'];?><td>
                </tr>
                <tr>
                    <td>Manufacturer<td>
                    <td><?echo $row['manufacturer'];?><td>
                </tr>
            </table>
            <?
        }