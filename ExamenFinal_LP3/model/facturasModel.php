<?php
    class facturasModel{
        private $PDO;
        public function __construct()
        {
            include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');
            require_once(DAO_PATH.'database.php');
            $data = new dataConex();
            $this->PDO = $data->conexion();
        }
        
        public function listar() {
            $sql = 'SELECT f.nro_factura, f.fecha_factura, concat(c.nombre_cliente," ",c.apellido_cliente) as cliente, concat(u.nombre," ",u.apellido) as usuario FROM factura_ventas_enc as f INNER JOIN clientes as c ON f.id_clientes=c.id_clientes INNER JOIN usuarios as u ON f.id_user=u.id_user ORDER BY f.nro_factura DESC';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }

        public function listarenc() {
            $sql = 'SELECT f.timbrado, f.nro_factura, f.fecha_factura f.anulado, 
            concat(c.nombre_cliente," ",c.apellido_cliente) as cliente, 
            concat(u.nombre," ",u.apellido) as usuario, 
            tf.descripcion_tipo_factura, 
            FROM factura_ventas_enc as f 
            INNER JOIN clientes as c ON f.id_clientes=c.id_clientes 
            INNER JOIN tipo_factura as tf ON f.id_tipo_factura=tf.id_tipo_factura, 
            INNER JOIN usuarios as u ON f.id_user=u.id_user 
            ORDER BY f.nro_factura DESC';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }

        public function listardet() {
            $sql = 'SELECT d.cantidad, 
            i.nombre_item, i.precio_venta, 
            SUM(d.cantidad*i.precio_venta) as total,  
            concat(u.nombre," ",u.apellido) as usuario, 
            tf.descripcion_tipo_factura, 
            FROM factura_ventas_enc as f 
            INNER JOIN clientes as c ON f.id_clientes=c.id_clientes 
            INNER JOIN tipo_factura as tf ON f.id_tipo_factura=tf.id_tipo_factura, 
            INNER JOIN usuarios as u ON f.id_user=u.id_user 
            ORDER BY f.nro_factura DESC';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }


        public function insertar($numero,$fecha,$cajeros,$cliente,$formasPago){
            $stament = $this->PDO->prepare("INSERT INTO factura_ventas_enc VALUES(0,:numero,:fecha,:cajeros,:cliente,:formasPago)");
            $stament->bindParam(":numero",$numero);
            $stament->bindParam(":fecha",$fecha);
            $stament->bindParam(":cajeros",$cajeros);
            $stament->bindParam(":cliente",$cliente);
            $stament->bindParam(":formasPago",$formasPago);
            return ($stament->execute()) ? $this->PDO->lastInsertId() : false;
        }
         public function insertarDetalles($cantidad,$precio,$idFacturas,$idProductos){
            $stament = $this->PDO->prepare("INSERT INTO detalle_facturas VALUES(:cantidad,:precio,:idFacturas,:idProductos)");
            $stament->bindParam(":cantidad",$cantidad);
            $stament->bindParam(":precio",$precio);
            $stament->bindParam(":idFacturas",$idFacturas);
            $stament->bindParam(":idProductos",$idProductos);
            return ($stament->execute()) ? true  : false;
        }

        public function show($id){
            $stament = $this->PDO->prepare("SELECT * FROM cajeros where idcajeros = :id limit 1");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? $stament->fetch() : false;
        }
        public function showPer($id){
            $stament = $this->PDO->prepare("SELECT ruc,telefono FROM clientes WHERE idCliente = :id");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? $stament->fetchALL() : false;
        }
        public function showNumFactura(){
            $stament = $this->PDO->prepare("SELECT ifnull(max(numero)+1,1) as numero FROM facturas");
            return ($stament->execute()) ? $stament->fetchALL() : false;
        }
        public function index(){
            $stament = $this->PDO->prepare("select f.idFactura,f.fecha,c.nombre,c.apellido FROM facturas f , clientes c  where  clientes_idCliente = idCliente");
            return ($stament->execute()) ? $stament->fetchALL() : false;
        }
        public function CabezeraFactura($id){
            $stament = $this->PDO->prepare("SELECT f.numero,f.fecha,c.Nombre AS cajero  ,g.nombre,g.apellido,g.RUC FROM facturas f , cajeros c , clientes g WHERE cajeros_idCajeros = idCajeros AND clientes_idCliente = idCliente and idFactura = :id");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? $stament->fetchALL() : false;
        }
        public function DetalleFactura($id){
            $stament = $this->PDO->prepare("SELECT P.idProducto,d.cantidad,p.nombre,p.precio FROM detalle_facturas d , productos p, facturas f WHERE productos_idProducto = idProducto AND 	facturas_idFactura = idFactura and idFactura = :id");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? $stament->fetchALL() : false;
        }
        public function indexModel(){
            $stament = $this->PDO->prepare("SELECT * FROM productos ORDER BY idProducto");
            return ($stament->execute()) ? $stament->fetchALL() : false;
        }
        public function delete($id){
            $stament = $this->PDO->prepare("DELETE FROM cajeros WHERE idcajeros = :id");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? true : false;
        }
        public function deleteDetalles($id){
            $stament = $this->PDO->prepare("DELETE FROM  detalle_facturas WHERE facturas_idFactura = :id");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? true : false;
        }
        ////////////////////////////////// JSON //////////////////////////////////////////////
        public function getDetalles($sesion) {
            return json_decode(file_get_contents("tmpFacVen$sesion.json"), true);
        }
    
        public function getDetalleById($id,$sesion) {
            $detalles = $this->getDetalles($sesion);
            foreach ($detalles as $detalle) {
                if ($detalle['id'] == $id) {
                    return $detalle;
                }
            }
            return null;
        }
    
        public function createDetalleExist($data,$sesion) {
    
            $detalles = $this->getDetalles($sesion);
            $detalles[] = $data;
            $this->putJson($detalles,$sesion);
    
        }
    
        public function createDetalleNotExist($data,$sesion) {
    
            $detalles[] = $data;
            $this->putJson($detalles,$sesion);
    
        }
    
        public function deleteDetalle($id,$sesion) {
    
            $detalles = $this->getDetalles($sesion);
    
            foreach ($detalles as $i => $detalle) {
                if ($detalle['idProducto'] == $id) {
                    array_splice($detalles, $i, 1);
                }
            }
    
            $this->putJson($detalles,$sesion);
        }
    
        public function deleteAllDetalles($sesion) {
    
            $detalles = $this->getDetalles($sesion);
    
            foreach ($detalles as $i => $detalle) {
                    array_splice($detalles, $i, 1);
            }
    
            $this->putJson($detalles,$sesion);
        }
    
        public function putJson($detalles,$sesion) {
            file_put_contents("tmpFacVen$sesion.json", json_encode($detalles, JSON_PRETTY_PRINT));
        }
    }   

?>