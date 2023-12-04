<?php
class productosModel
{
    private $PDO;

    public function __construct()
    {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/ExamenFinal_LP3/routes.php');
        require_once(DAO_PATH . 'database.php');
        $data = new dataConex();
        $this->PDO = $data->conexion();
    }

    public function insertar($id_item, $codigobarras, $nombre_item, $descripcion, $precio_costo, $precio_venta, $id_categoria, $id_marca)
    {
        $sql = 'INSERT INTO items VALUES (:id_item,:codigobarras,:nombre_item,:descripcion,:precio_costo,:precio_venta,:id_categoria,:id_marca)';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':id_item', $id_item);
        $statement->bindParam(':codigobarras', $codigobarras);
        $statement->bindParam(':nombre_item', $nombre_item);
        $statement->bindParam(':descripcion', $descripcion);
        $statement->bindParam(':precio_costo', $precio_costo);
        $statement->bindParam(':precio_venta', $precio_venta);
        $statement->bindParam(':id_categoria', $id_categoria);
        $statement->bindParam(':id_marca', $id_marca);
        $statement->execute();
        return ($this->PDO->lastInsertId());
    }

    public function actualizar($id_item, $codigobarras, $nombre_item, $descripcion, $precio_costo, $precio_venta, $id_categoria, $id_marca)
    {
        $sql = 'UPDATE items SET codigobarras=:codigobarras, nombre_item=:nombre_item, descripcion=:descripcion, precio_costo=:precio_costo, precio_venta=:precio_venta, id_categoria=:id_categoria, id_marca=:id_marca WHERE id_item=:id_item';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':id_item', $id_item);
        $statement->bindParam(':codigobarras', $codigobarras);
        $statement->bindParam(':nombre_item', $nombre_item);
        $statement->bindParam(':descripcion', $descripcion);
        $statement->bindParam(':precio_costo', $precio_costo);
        $statement->bindParam(':precio_venta', $precio_venta);
        $statement->bindParam(':id_categoria', $id_categoria);
        $statement->bindParam(':id_marca', $id_marca);
        return ($statement->execute()) ? true : false;
    }

    public function eliminar($id_item)
    {
        $sql = 'DELETE FROM items WHERE id_item=:id_item';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':id_item', $id_item);
        return ($statement->execute()) ? true : false;
    }
    public function listar()
    {
        $sql = 'SELECT i.id_item, i.codigobarras, i.nombre_item, i.descripcion, i.precio_costo, i.precio_venta, ic.id_categoria, ic.descripcion_categoria, ic.porcentaje_iva, im.id_marca, im.nombre_marca
        FROM items i
        INNER JOIN item_categorias ic ON i.id_categoria = ic.id_categoria
        INNER JOIN item_marcas im ON i.id_marca = im.id_marca
        ORDER BY i.id_item DESC';

        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }
    public function buscar($id_item)
    {
        $sql = 'SELECT * FROM items WHERE id_item=:id_item';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':id_item', $id_item);
        return ($statement->execute()) ? $statement->fetch() : false;
    }
    public function ultimo()
    {
        $sql = 'SELECT * FROM items ORDER by id_item DESC LIMIT 1';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetch() : false;
    }
    public function desplegableCategoria()
    {
        $sql = 'SELECT id_categoria, descripcion_categoria, porcentaje_iva FROM item_categorias ORDER BY id_categoria ASC';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }
    public function desplegableMarca()
    {
        $sql = 'SELECT id_marca, nombre_marca FROM item_marcas ORDER BY id_marca ASC';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }
}
?>