<page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; border: solid 1px black;">
            <tr>
                <td style="text-align: left;    width: 33%">Listado de Clientes</td>
                <td style="text-align: center;    width: 34%">Examen_LP3 2023</td>
                <td style="text-align: right;    width: 33%"><?php echo date('d/m/Y'); ?></td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: solid 1px black;">
            <tr>
                <td style="text-align: left;    width: 50%">Leng. Prog. III</td>
                <td style="text-align: right;    width: 50%">página [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>

    <br><br>
    
    <table style="width: 70%;border: solid 1px #5544DD; border-collapse: collapse" align="center">
        <thead>
            <tr>
                <th style="width: 15%; text-align: left; border: solid 1px #900C3F; background: #900C3F; text-color: #FFFFFF;"><span style="color: #FFFFFF;">CODIGO</span></th>
                <th style="width: 25%; text-align: left; border: solid 1px #900C3F; background: #900C3F; text-color: #FFFFFF;"><span style="color: #FFFFFF;">NOMBRE</span></th>
                <th style="width: 30%; text-align: left; border: solid 1px #900C3F; background: #900C3F; text-color: #FFFFFF;"><span style="color: #FFFFFF;">APELLIDO</span></th>
                <th style="width: 30%; text-align: left; border: solid 1px #900C3F; background: #900C3F; text-color: #FFFFFF;"><span style="color: #FFFFFF;">RUC o CI</span></th>
            </tr>
        </thead>
        <tbody>
                <?php
                foreach ($rows as $row) {
                ?>
                        <tr>
                            <td style="width: 20%; text-align: left; border: solid 1px #900C3F">
                                    <?=$row['id_clientes'] ?>
                            </td>
                            <td style="width: 45%; text-align: left; border: solid 1px #900C3F">
                                    <?=$row['nombre_cliente'] ?>
                            </td>
                            <td style="width: 45%; text-align: left; border: solid 1px #900C3F">
                                    <?=$row['apellido_cliente'] ?>
                            </td>
                            <td style="width: 45%; text-align: left; border: solid 1px #900C3F">
                                    <?=$row['ruc_ci'] ?>
                            </td>
                        </tr>
                <?php
                }
                ?>
        </tbody>
        <!-- <tfoot>
            <tr>
                <th style="width: 30%; text-align: left; border: solid 1px #900C3F; background: #CCFFCC">Fin del reporte</th>
                <th style="width: 30%; text-align: left; border: solid 1px #900C3F; background: #CCFFCC">Gracias!</th>
            </tr>
        </tfoot> -->
    </table>   
</page>
