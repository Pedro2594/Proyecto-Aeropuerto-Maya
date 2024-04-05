<?php

use PHPUnit\Framework\TestCase;

class ValidateLetters
{
    public function isValidName($name)
    {
        $pattern = "/^[a-zA-ZÀ-ÿ\s]{4,15}$/";
        return preg_match($pattern, $name) === 1;
    }

}

class ValidarString
{
    public function isValid($string)
    {
        $pattern = "^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s[a-zA-ZÀ-ÿ\u00f1\u00d1]+)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$";
        return preg_match("/$pattern/", $string) === 1;
    }

}
   /*----------- TABLAS MARCELA --------------*/ 

 /* ------------ Método de guardar pais -----------*/

class GuardarPais {
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);
       
        $Nombre = $conexion->real_escape_string($datos['Nombre']);
        $Region = $conexion->real_escape_string($datos['Region']);
        $query = "INSERT INTO `pais` ( `Nombre`, `Region`)  VALUES ('$Nombre','$Region')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}
/* ------------ Método de guardar region -----------*/

class GuardarRegion{
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);
       
        $Nombre = $conexion->real_escape_string($datos['Nombre']);
        
        $query = "INSERT INTO `region` ( `Nombre`)  VALUES ('$Nombre')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}
/* ------------ Método de guardar moneda -----------*/

class GuardarMoneda{
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);
       
        $Nombre = $conexion->real_escape_string($datos['Nombre']);
        $ConversionADolar = $conexion->real_escape_string($datos['ConversionADolar']);
        
        $query = "INSERT INTO `moneda` (`Nombre`, `ConversionADolar`)   VALUES ('$Nombre','$ConversionADolar')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}

/* ------------ Método de guardar aeronave -----------*/
class GuardarAeronave{
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);
       
        $matricula = $conexion->real_escape_string($datos['Matricula']);
        $modelo = $conexion->real_escape_string($datos['Modelo']);
        $capacidad = $conexion->real_escape_string($datos['Capacidad']);
        $tamaño = $conexion->real_escape_string($datos['Tamaño']);
        $tipo = $conexion->real_escape_string($datos['Tipo']);
        $area = $conexion->real_escape_string($datos['Area']);

        $query = "INSERT INTO `aeronave` ( `Matricula`, `Modelo`, `Capacidad`, `Tamaño`, `Tipo`, `Area`)  
         VALUES ('$matricula', '$modelo', '$capacidad', '$tamaño', '$tipo', '$area')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}

/* ------------ Método de guardar aeropuerto -----------*/
class GuardarAeropuerto{
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);
       
        $nombre = $conexion->real_escape_string($datos['Nombre']);
        $hangar = $conexion->real_escape_string($datos['Hangar']);
        $id_ciudad = $conexion->real_escape_string($datos['Id_Ciudad']);
       

        $query = "INSERT INTO `aeropuerto` ( `Nombre`, `Hangar`, `Id_Ciudad`)  
         VALUES ('$nombre', '$hangar', '$id_ciudad')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}
/*----------- TABLAS EDUARDO --------------*/ 

 /* ------------ Método de guardar boleto -----------*/

 class GuardarBoleto {
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);
       
        $Codigo = $conexion->real_escape_string($datos['Codigo']);
        $Id_Asiento = $conexion->real_escape_string($datos['Id_Asiento']);
        $Id_Pasajero = $conexion->real_escape_string($datos['Id_Pasajero']);
        $Id_Vuelo = $conexion->real_escape_string($datos['Id_Vuelo']);
        $Id_Equipaje = $conexion->real_escape_string($datos['Id_Equipaje']);
        $Id_Clase = $conexion->real_escape_string($datos['Id_Clase']);
        $Precio = $conexion->real_escape_string($datos['Precio']);
        $query = "INSERT INTO `boleto` ( `Codigo`, `Id_Asiento`, `Id_Pasajero`, `Id_Vuelo`, `Id_Equipaje`, `Id_Clase`, `Precio`)  VALUES ('$Codigo','$Id_Asiento', '$Id_Pasajero', '$Id_Vuelo', '$Id_Equipaje', '$Id_Clase', '$Precio')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}
/* ------------ Método de guardar ciudad -----------*/

class GuardarCiudad {
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);
       
        $Nombre = $conexion->real_escape_string($datos['Nombre']);
        $Codigo = $conexion->real_escape_string($datos['Codigo']);
        $Terminal = $conexion->real_escape_string($datos['Terminal']);
        $Id_Pais = $conexion->real_escape_string($datos['Id_Pais']);
        $query = "INSERT INTO `ciudad` (`Nombre`, `Codigo`, `Terminal`, `Id_Pais`)  VALUES ('$Nombre','$Codigo','$Terminal', '$Id_Pais')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}
/* ------------ Método de guardar equipaje -----------*/

class GuardarEquipaje {
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);
       
        $Peso = $conexion->real_escape_string($datos['Peso']);
        $Cantidad = $conexion->real_escape_string($datos['Cantidad']);
        $MultiplicadorPrecio = $conexion->real_escape_string($datos['MultiplicadorPrecio']);
        $query = "INSERT INTO `equipaje` (`Peso`, `Cantidad`, `MultiplicadorPrecio`)  VALUES ('$Peso','$Cantidad','$MultiplicadorPrecio')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}
/* ------------ Método de guardar vuelo -----------*/

class GuardarVuelo {
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);
       
        $Codigo = $conexion->real_escape_string($datos['Codigo']);
        $Lugar_Salida = $conexion->real_escape_string($datos['Lugar_Salida']);
        $Lugar_LLegada = $conexion->real_escape_string($datos['Lugar_LLegada']);
        $Hora_Salida = $conexion->real_escape_string($datos['Hora_Salida']);
        $Hora_LLegada = $conexion->real_escape_string($datos['Hora_LLegada']);
        $Fecha = $conexion->real_escape_string($datos['Fecha']);
        $Precio = $conexion->real_escape_string($datos['Precio']);
        $Id_Aeronave = $conexion->real_escape_string($datos['Id_Aeronave']);
        $query = "INSERT INTO `vuelo` (`Codigo`, `Lugar_Salida`, `Lugar_LLegada`, `Hora_Salida`, `Hora_LLegada`, `Fecha`, `Precio`, `Id_Aeronave`)  VALUES ('$Codigo','$Lugar_Salida','$Lugar_LLegada', '$Hora_Salida', '$Hora_LLegada', '$Fecha', '$Precio', '$Id_Aeronave')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}
/* ------------ Método de guardar parametro -----------*/

class GuardarParametros {
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);
       
        $Cai = $conexion->real_escape_string($datos['Cai']);
        $Fecha_Ven = $conexion->real_escape_string($datos['Fecha_Ven']);
        $Fecha_Emi = $conexion->real_escape_string($datos['Fecha_Emi']);
        $Rango_Ini = $conexion->real_escape_string($datos['Rango_Ini']);
        $Rango_Fin = $conexion->real_escape_string($datos['Rango_Fin']);
        $Consecutivo = $conexion->real_escape_string($datos['Consecutivo']);
        $Estado = $conexion->real_escape_string($datos['Estado']);
        $query = "INSERT INTO `parametro` (`Cai`, `Fecha_Ven`, `Fecha_Emi`, `Rango_Ini`, `Rango_Fin`, `Consecutivo`, `Estado`)  VALUES ('$Cai','$Fecha_Ven','$Fecha_Emi', '$Rango_Ini', '$Rango_Fin', '$Consecutivo', '$Estado')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}
/* ------------ Método de guardar paseabordar -----------*/

class GuardarPaseabordar {
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);
       
        $Codigo = $conexion->real_escape_string($datos['Codigo']);
        $Fecha = $conexion->real_escape_string($datos['Fecha']);
        $Puerta_Embarque = $conexion->real_escape_string($datos['Puerta_Embarque']);
        $Id_Boleto = $conexion->real_escape_string($datos['Id_Boleto']);
        $Id_Pasajero = $conexion->real_escape_string($datos['Id_Pasajero']);
        $query = "INSERT INTO `paseabordar` (`Codigo`, `Fecha`, `Puerta_Embarque`, `Id_Boleto`, `Id_Pasajero`)  VALUES ('$Codigo','$Fecha','$Puerta_Embarque', '$Id_Boleto', '$Id_Pasajero')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}
/* ------------ Método de guardar reserva -----------*/

class GuardarReserva {
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);
       
        $Codigo = $conexion->real_escape_string($datos['Codigo']);
        $Id_Vuelo = $conexion->real_escape_string($datos['Id_Vuelo']);
        $Precio = $conexion->real_escape_string($datos['Precio']);
        $query = "INSERT INTO `reserva` (`Codigo`, `Id_Vuelo`, `Precio`)  VALUES ('$Codigo','$Id_Vuelo','$Precio')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}
/* ------------ Método de guardar usuario -----------*/

class GuardarUsuario {
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);
       
        $Usuario = $conexion->real_escape_string($datos['Usuario']);
        $Pass = $conexion->real_escape_string($datos['Pass']);
        $Estado = $conexion->real_escape_string($datos['Estado']);
        $query = "INSERT INTO `usuario` (`Usuario`, `Pass`, `Estado`)  VALUES ('$Usuario','$Pass','$Estado')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}
/*----------- TABLAS PEDRO --------------*/ 

 /* ------------ Método de guardar checkin -----------*/

 class Guardarcheckin {
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);

        $Id_Reserva = $conexion->real_escape_string($datos['Id_Reserva']);
        $Id_Pasajero = $conexion->real_escape_string($datos['Id_Pasajero']);
        $query = "INSERT INTO `checkin` (`Id_Reserva`,'Id_Pasajero')  VALUES ('$Id_Reserva','$Id_Pasajero')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}

class Guardarclase {
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);

        $Tipo_Clase = $conexion->real_escape_string($datos['Tipo_Clase']);
        $Descripcion = $conexion->real_escape_string($datos['Descripcion']);
        $MultiplicadorPrecio = $conexion->real_escape_string($datos['MultiplicadorPrecio']);
        $query = "INSERT INTO `clase` (`Tipo_Clase`,'Descripcion','MultiplicadorPrecio')  VALUES ('$Tipo_Clase','$Descripcion','$MultiplicadorPrecio')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}

class Guardardetallefactura {
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);

        $Id_Detalle = $conexion->real_escape_string($datos['Id_Detalle']);
        $Id_Boleto = $conexion->real_escape_string($datos['Id_Boleto']);
        $Cantidad = $conexion->real_escape_string($datos['Cantidad']);
        $Descripcion = $conexion->real_escape_string($datos['Descripcion']);
        $Subtotal = $conexion->real_escape_string($datos['Subtotal']);
        $Total_Descuento = $conexion->real_escape_string($datos['Total_Descuento']);
        $Total_Impuesto = $conexion->real_escape_string($datos['Total_Impuesto']);
        $Total = $conexion->real_escape_string($datos['Total']);
        $Estado = $conexion->real_escape_string($datos['Estado']);
        $query = "INSERT INTO `detallefactura` (`Id_Detalle`,'Id_Boleto','Cantidad','Descripcion','Subtotal','Total_Descuento','Total_Impuesto','Total','Estado')  VALUES ('$Id_Detalle','$Id_Boleto','$Cantidad','$Descripcion','$Subtotal','$Total_Descuento','$Total_Impuesto','$Total','$Estado')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}

class Guardarfactura {
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);

        $Id_Parametro = $conexion->real_escape_string($datos['Id_Parametro']);
        $Codigo = $conexion->real_escape_string($datos['Codigo']);
        $RTN = $conexion->real_escape_string($datos['RTN']);
        $CAI = $conexion->real_escape_string($datos['CAI']);
        $Id_Detalle = $conexion->real_escape_string($datos['Id_Detalle']);
        $Fecha = $conexion->real_escape_string($datos['Fecha']);
        $Id_Moneda = $conexion->real_escape_string($datos['Id_Moneda']);
        $Monto = $conexion->real_escape_string($datos['Monto']);
        $Metodo_Pago = $conexion->real_escape_string($datos['Metodo_Pago']);
        $Cantidad_Efectivo = $conexion->real_escape_string($datos['Cantidad_Efectivo']);
        $Numero_Tarjeta = $conexion->real_escape_string($datos['Numero_Tarjeta']);
        $query = "INSERT INTO `factura` (`Id_Parametro`,'Codigo','RTN','CAI','Id_Detalle','Fecha','Id_Moneda','Monto','Metodo_Pago','Cantidad_Efectvio','Numero_Tarjeta')  VALUES (`$Id_Parametro`,'$Codigo','$RTN','$CAI','$Id_Detalle','$Fecha','$Id_Moneda','$Monto','$Metodo_Pago','$Cantidad_Efectivo','$Numero_Tarjeta')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}

class Guardarhangar {
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);

        $Codigo = $conexion->real_escape_string($datos['Codigo']);
        $Capacidad = $conexion->real_escape_string($datos['Capacidad']);
        $Id_Aeronave = $conexion->real_escape_string($datos['Id_Aeronave']);
        $Id_Aeropuerto = $conexion->real_escape_string($datos['Id_Aeropuerto']);
        $query = "INSERT INTO `hangar` (`Codigo`,'Capacidad','Id_Aeronave','Id_Aeropuerto')  VALUES (`$Codigo`,'$Capacidad','$Id_Aeronave','$Id_Aeropuerto')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}

class Guardarpasajero {
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);

        $Nombre = $conexion->real_escape_string($datos['Nombre']);
        $Tipo_Documento = $conexion->real_escape_string($datos['Tipo_Documento']);
        $Numero_Documento = $conexion->real_escape_string($datos['Numero_Documento']);
        $Telefono = $conexion->real_escape_string($datos['Telefono']);
        $Correo = $conexion->real_escape_string($datos['Correo']);
        $Id_Pais = $conexion->real_escape_string($datos['Id_Pais']);
        $Fecha_Nacimiento = $conexion->real_escape_string($datos['Fecha_Nacimiento']);
        $query = "INSERT INTO `pasajero` (`Nombre`,'Tipo_Documento','Numero_Documento','Telefono','Correo','Id_Pais','Fecha_Nacimiento')  VALUES (`$Nombre`,'$Tipo_Documento','$Numero_Documento','$Telefono','$Correo','$Id_Pais','$Fecha_Nacimiento')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}

class Guardarpersonaltierra {
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);

        $Carga_Academica = $conexion->real_escape_string($datos['Carga_Academica']);
        $Cargo = $conexion->real_escape_string($datos['Cargo']);
        $query = "INSERT INTO `personaltierra` (`Carga_Academica`,'Cargo')  VALUES (`$Carga_Academica`,'$Cargo')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}

class Guardartripulacion {
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);

        $Cargo = $conexion->real_escape_string($datos['Cargo']);
        $Horas_Vuelo = $conexion->real_escape_string($datos['Horas_Vuelo']);
        $Tipo_Licencia = $conexion->real_escape_string($datos['Tipo_Licencia']);
        $Academia = $conexion->real_escape_string($datos['Academia']);
        $query = "INSERT INTO `tripulacion` ('Cargo','Horas_Vuelo','Tipo_Licencia','Academia')  VALUES ('$Cargo','$Horas_Vuelo','$Tipo_Licencia','$Academia')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}

class OperationTest extends TestCase
{
    /* 
    public function testIsValidName()
    {
        $validator = new ValidateLetters();

        $this->assertTrue($validator->isValidName("Marcela Nuñéz"));
        
    }
    
    public function testIsValid()
    {
        $validator = new ValidarString();

        $this->assertTrue($validator->isValid("John Doe"));
        $this->assertFalse($validator->isValid("Jane  Flores"));
        $this->assertTrue($validator->isValid("Marcela Rodríguez"));
        $this->assertFalse($validator->isValid("Joaquín@#@!"));

    }

    
    public function testSoloNumeros()
    {
        $numbers = [1, 2, 3, 4, 5];
        foreach ($numbers as $number) {
            $this->assertTrue($this->acceptOnlyNumbers($number));
        }
    }

    public function testSoloLetras()
    {
        $nonNumbers = ['g', 'b', 'c', 'd'];
        foreach ($nonNumbers as $nonNumber) {
            $this->assertFalse($this->acceptOnlyNumbers($nonNumber));
        }
    }

    private function acceptOnlyNumbers($input)
    {
        return is_numeric($input);
    }*/

    /* ------------------------------------------------------------------*/
    /*----------- TABLAS MARCELA --------------*/
    /*--------- Tabla de guardar pais ----------*/

    public function testGuardarPais()
    {
    $datosPrueba = array(
        
        'Nombre' => 'Argentina',
        'Region' => 'América del sur'
    );
     // Validamos que no hayan simbolos en los datos
   foreach($datosPrueba as $dato) {
    if(!preg_match('/^[a-zA-Z0-9]+$/', $dato)) {
        $this->fail('Uno o más campos contienen símbolos no permitidos.');
    }
}
    // Validamos si algun campo esta vacio
    foreach($datosPrueba as $dato) {
        if(empty($dato)) {
            $this->fail('Uno o más campos están vacíos.');
        }
    }

    // Validamos que el campo 'Nombre' no contenga símbolos ni números
if(!preg_match('/^[a-zA-Z]+$/', $datosPrueba['Nombre'])) {
    $this->fail('El campo "Nombre" no debe contener símbolos ni números.');
}
 // Validamos que el campo 'Region' no contenga símbolos ni números
 if(!preg_match('/^[a-zA-Z]+$/', $datosPrueba['Region'])) {
    $this->fail('El campo "Region" no debe contener símbolos ni números.');
}
    $objeto = new GuardarPais();
    $resultado = $objeto->guardarDatos($datosPrueba);

    $this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}

 /*--------- Tabla de guardar region ----------*/
 
public function testGuardarRegion()
{
$datosPrueba = array(
    
    'Nombre' => 'bebesita',
    
);

 // Validamos que no hayan simbolos en los datos
 foreach($datosPrueba as $dato) {
    if(!preg_match('/^[a-zA-Z0-9]+$/', $dato)) {
        $this->fail('Uno o más campos contienen símbolos no permitidos.');
    }
}
// Validamos que el campo 'Nombre' no contenga símbolos ni números
if(!preg_match('/^[a-zA-Z]+$/', $datosPrueba['Nombre'])) {
    $this->fail('El campo "Nombre" no debe contener símbolos ni números.');
}
// Validamos si algun campo esta vacio
foreach($datosPrueba as $dato) {
    if(empty($dato)) {
        $this->fail('Uno o más campos están vacíos.');
    }
}
$objeto = new GuardarRegion();
$resultado = $objeto->guardarDatos($datosPrueba);

$this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}
/*--------- Tabla de guardar moneda ----------*/

public function testGuardarMoneda()
{
    $datosPrueba = array(
    
        'Nombre' => 'ggg',
        'ConversionADolar'  => '4.5',
        
    );
     
    // Validamos si algun campo esta vacio
foreach($datosPrueba as $dato) {
    if(empty($dato)) {
        $this->fail('Uno o más campos están vacíos.');
    }
}

 // Validamos que el campo 'Nombre' no contenga símbolos ni números
 if(!preg_match('/^[a-zA-Z]+$/', $datosPrueba['Nombre'])) {
    $this->fail('El campo "Nombre" no debe contener símbolos ni números.');
}
   // Validamos que el campo 'ConversionADolar' solo contenga números enteros y decimales
   if(!preg_match('/^[0-9]+(\.[0-9]+)?$/', $datosPrueba['ConversionADolar'])) {
    $this->fail('El campo "ConversionADolar" solo debe contener números enteros y decimales.');
}

    $objeto = new GuardarMoneda();
    $resultado = $objeto->guardarDatos($datosPrueba);
    
    $this->assertTrue($resultado);
}

/*--------- Tabla de guardar aeronave ----------*/

public function testGuardarAeronave()
{
    $datosPrueba = array(
    
        'Matricula' => 'RRH123',
        'Modelo'  => 'Dassault',
        'Capacidad' => '700',
        'Tamaño'  => '1300',
        'Tipo' => 'Comercial',
        'Area'  => 'Pers',
        
    );



    // Validamos si algun campo esta vacio
    foreach($datosPrueba as $dato) {
    if(empty($dato)) {
        $this->fail('Uno o más campos están vacíos.');
    }
   } 
   // Validamos que el campo 'Modelo' no contenga símbolos ni números
 if(!preg_match('/^[a-zA-Z]+$/', $datosPrueba['Modelo'])) {
    $this->fail('El campo "Modelo" no debe contener símbolos ni números.');
 }

 // Validamos que el campo 'Capacidad' solo contenga números enteros y decimales
 if(!preg_match('/^[0-9]+(\.[0-9]+)?$/', $datosPrueba['Capacidad'])) {
    $this->fail('El campo "Capacidad" solo debe contener números enteros y decimales.');
 }
 // Validamos que el campo 'Tamaño' solo contenga números enteros y decimales
 if(!preg_match('/^[0-9]+(\.[0-9]+)?$/', $datosPrueba['Tamaño'])) {
    $this->fail('El campo "Tamaño" solo debe contener números enteros y decimales.');
}

  // Validamos que el campo 'Tipo' no contenga símbolos ni números
  if(!preg_match('/^[a-zA-Z]+$/', $datosPrueba['Tipo'])) {
    $this->fail('El campo "Tipo" no debe contener símbolos ni números.');
}

// Validamos que el campo 'Area' no contenga símbolos ni números
if(!preg_match('/^[a-zA-Z]+$/', $datosPrueba['Area'])) {
    $this->fail('El campo "Area" no debe contener símbolos ni números.');
}

// Validamos que el campo 'Matricula' no contenga símbolos ni números
if(!preg_match('/^[a-zA-Z0-9]+$/', $datosPrueba['Matricula'])) {
    $this->fail('El campo "Matricula" no debe contener símbolos no permitidos.');
}
   // Validamos que el campo 'Modelo' solo contenga números enteros y decimales
   if(!preg_match('/^[a-zA-Z0-9]+$/', $datosPrueba['Modelo'])) {
    $this->fail('El campo "Modelo" solo debe contener números enteros y letras.');
}
// Validamos que el campo 'Capacidad' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['Capacidad'])) {
    $this->fail('El campo "Capacidad" solo debe contener números enteros.');
}
// Validamos que el campo 'Tipo' no contenga símbolos ni números
if(!preg_match('/^[a-zA-Z]+$/', $datosPrueba['Tipo'])) {
    $this->fail('El campo "Tipo" no debe contener símbolos no permitidos.');
}
// Validamos que el campo 'Area' no contenga símbolos ni números
if(!preg_match('/^[a-zA-Z]+$/', $datosPrueba['Area'])) {
    $this->fail('El campo "Area" no debe contener símbolos no permitidos.');
}

    $objeto = new GuardarAeronave();
    $resultado = $objeto->guardarDatos($datosPrueba);
    
    $this->assertTrue($resultado);
    
}


/*--------- Tabla de guardar aeropuerto ----------*/

public function testGuardarAeropuerto()
{
    $datosPrueba = array(
    
        'Nombre' => 'AeroYork',
        'Hangar'  => '59',
        'Id_Ciudad' => '1',   
    );
    
    // Validamos si algun campo esta vacio
foreach($datosPrueba as $dato) {
    if(empty($dato)) {
        $this->fail('Uno o más campos están vacíos.');
    }
}

if(!preg_match('/^[a-zA-Z]+$/', $datosPrueba['Nombre'])) {
    $this->fail('El campo "Nombre" no debe contener símbolos ni números.');
 }


if(!preg_match('/^[a-zA-Z]+$/', $datosPrueba['Id_Ciudad'])) {
    $this->fail('El campo "Id_Ciudad" no debe contener símbolos ni números.');
}
// Validamos que el campo 'Nombre' no contenga símbolos ni números
if(!preg_match('/^[a-zA-Z]+$/', $datosPrueba['Nombre'])) {
    $this->fail('El campo "Nombre" no debe contener símbolos no permitidos.');
}
// Validamos que el campo 'Hangar' solo contenga números enteros y decimales
if(!preg_match('/^[a-zA-Z0-9]+$/', $datosPrueba['Hangar'])) {
    $this->fail('El campo "Hangar" solo debe contener números enteros y letras.');
}
// Validamos que el campo 'Id de ciudad' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['Id_Ciudad'])) {
    $this->fail('El campo "Id_Ciudad" solo debe contener números enteros.');

}
    $objeto = new GuardarAeropuerto();
    $resultado = $objeto->guardarDatos($datosPrueba);
    
    $this->assertTrue($resultado);
    
}
/*----------- TABLAS EDUARDO --------------*/
    /*--------- Tabla de guardar boleto ----------*/

    public function testGuardarBoleto()
    {
    $datosPrueba = array(
        
        'Codigo' => '20HOLA',
        'Id_Asiento' => '1',
        'Id_Pasajero' => '4',
        'Id_Vuelo' => '1',
        'Id_Equipaje' => '2',
        'Id_Clase' => '1',
        'Precio' => '200'
    );
     // Validamos que no hayan simbolos en los datos
 foreach($datosPrueba as $dato) {
    if(!preg_match('/^[a-zA-Z0-9]+$/', $dato)) {
        $this->fail('Uno o más campos contienen símbolos no permitidos.');
    }
}
// Validamos que el campo 'Codigo' solo contenga números enteros y decimales
if(!preg_match('/^[a-zA-Z0-9]+$/', $datosPrueba['Codigo'])) {
    $this->fail('El campo "Codigo" solo debe contener números enteros y letras.');
}
// Validamos que el campo 'Id de Asiento' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['Id_Asiento'])) {
    $this->fail('El campo "Id_Asiento" solo debe contener números enteros.');
}
// Validamos que el campo 'Id de Pasajero' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['Id_Pasajero'])) {
    $this->fail('El campo "Id_Pasajero" solo debe contener números enteros.');
}
// Validamos que el campo 'Id de Vuelo' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['Id_Vuelo'])) {
    $this->fail('El campo "Id_Vuelo" solo debe contener números enteros.');
}
// Validamos que el campo 'Id de Equipaje' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['Id_Equipaje'])) {
    $this->fail('El campo "Id_Equipaje" solo debe contener números enteros.');
}
// Validamos que el campo 'Id de Clase' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['Id_Clase'])) {
    $this->fail('El campo "Id_Clase" solo debe contener números enteros.');
}
// Validamos que el campo 'Precio' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+(\.[0-9]+)?$/', $datosPrueba['Precio'])) {
    $this->fail('El campo "Precio" solo debe contener números enteros y decimales.');
}
    // Validamos si algun campo esta vacio
    foreach($datosPrueba as $dato) {
        if(empty($dato)) {
            $this->fail('Uno o más campos están vacíos.');
        }
    }

    $objeto = new GuardarBoleto();
    $resultado = $objeto->guardarDatos($datosPrueba);

    $this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}
/*--------- Tabla de guardar ciudad ----------*/

public function testGuardarCiudad()
{
$datosPrueba = array(
    
    'Nombre' => 'Roatan',
    'Codigo' => '20234',
    'Terminal' => '13',
    'Id_Pais' => '1'
   );
 // Validamos que no hayan simbolos en los datos
foreach($datosPrueba as $dato) {
if(!preg_match('/^[a-zA-Z0-9]+$/', $dato)) {
    $this->fail('Uno o más campos contienen símbolos no permitidos.');
}
}
// Validamos que el campo 'Nombre' no contenga símbolos ni números
if(!preg_match('/^[a-zA-Z]+$/', $datosPrueba['Nombre'])) {
    $this->fail('El campo "Nombre" no debe contener símbolos no permitidos.');
}
// Validamos que el campo 'Codigo' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['Codigo'])) {
    $this->fail('El campo "Codigo" solo debe contener números enteros y letras.');
}
// Validamos que el campo 'Terminal' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['Terminal'])) {
    $this->fail('El campo "Terminal" solo debe contener números enteros y letras.');
}
// Validamos que el campo 'Id de pais' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['Id_Pais'])) {
    $this->fail('El campo "Id_Pais" solo debe contener números enteros y letras.');
}
// Validamos si algun campo esta vacio
foreach($datosPrueba as $dato) {
    if(empty($dato)) {
        $this->fail('Uno o más campos están vacíos.');
    }
}

$objeto = new GuardarCiudad();
$resultado = $objeto->guardarDatos($datosPrueba);

$this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}
/*--------- Tabla de guardar equipaje ----------*/

public function testGuardarEquipaje()
{
$datosPrueba = array(
    
    'Peso' => '40',
    'Cantidad' => '3',
    'MultiplicadorPrecio' => '1.5'
);
 // Validamos que no hayan simbolos en los datos
foreach($datosPrueba as $dato) {
if(!preg_match('/^[0-9.]+$/', $dato)) {
    $this->fail('Uno o más campos contienen símbolos no permitidos.');
}
}
// Validamos que el campo 'Peso' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['Peso'])) {
    $this->fail('El campo "Peso" solo debe contener números enteros.');
}
// Validamos que el campo 'Cantidad' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['Cantidad'])) {
    $this->fail('El campo "Cantidad" solo debe contener números enteros.');
}
// Validamos que el campo 'Multiplicador de precio' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+(\.[0-9]+)?$/', $datosPrueba['MultiplicadorPrecio'])) {
    $this->fail('El campo "MultiplicadorPrecio" solo debe contener números enteros y decimales.');
}
// Validamos si algun campo esta vacio
foreach($datosPrueba as $dato) {
    if(empty($dato)) {
        $this->fail('Uno o más campos están vacíos.');
    }
}

$objeto = new GuardarEquipaje();
$resultado = $objeto->guardarDatos($datosPrueba);

$this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}
 /*--------- Tabla de guardar vuelo ----------*/

 public function testGuardarVuelo()
 {
 $datosPrueba = array(
     
     'Codigo' => '20HOLA',
     'Lugar_Salida' => 'Tocontin IA',
     'Lugar_LLegada' => 'Goloson IA',
     'Hora_Salida' => '03:40:00',
     'Hora_LLegada' => '05:45:00',
     'Fecha' => '2023-02-17',
     'Precio' => '200',
     'Id_Aeronave' => '18'
 );
  // Validamos que no hayan simbolos en los datos
foreach($datosPrueba as $dato) {
 if(!preg_match('/^[a-zA-Z0-9: -]+$/', $dato)) {
     $this->fail('Uno o más campos contienen símbolos no permitidos.');
 }
}
// Validamos que el campo 'Codigo' solo contenga números enteros y decimales
if(!preg_match('/^[a-zA-Z0-9]+$/', $datosPrueba['Codigo'])) {
    $this->fail('El campo "Codigo" solo debe contener números enteros y letras.');
}
// Validamos que el campo 'Lugar de salida' no contenga símbolos ni números
if(!preg_match('/^[a-zA-Z]+$/', $datosPrueba['Lugar_Salida'])) {
    $this->fail('El campo "Lugar_Salida" no debe contener símbolos no permitidos.');
}
// Validamos que el campo 'Lugar de llegada' no contenga símbolos ni números
if(!preg_match('/^[a-zA-Z]+$/', $datosPrueba['Lugar_LLegada'])) {
    $this->fail('El campo "Lugar_LLegada" no debe contener símbolos no permitidos.');
}
// Validamos que el campo 'Hora de salida' no contenga símbolos ni números
if(!preg_match('/^[0-9: -]+$/', $datosPrueba['Hora_Salida'])) {
    $this->fail('El campo "Hora_Salida" no debe contener símbolos no permitidos.');
}
// Validamos que el campo 'Fecha' no contenga símbolos ni números
if(!preg_match('/^[0-9: -]+$/', $datosPrueba['Fecha'])) {
    $this->fail('El campo "Fecha" no debe contener símbolos no permitidos.');
}
// Validamos que el campo 'precio' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+(\.[0-9]+)?$/', $datosPrueba['Precio'])) {
    $this->fail('El campo "Precio" solo debe contener números enteros y decimales.');
}
// Validamos que el campo 'Id_Aeronave' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['Id_Aeronave'])) {
    $this->fail('El campo "Id_Aeronave" solo debe contener números enteros.');
}
 // Validamos si algun campo esta vacio
 foreach($datosPrueba as $dato) {
     if(empty($dato)) {
         $this->fail('Uno o más campos están vacíos.');
     }
 }

 $objeto = new GuardarVuelo();
 $resultado = $objeto->guardarDatos($datosPrueba);

 $this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}
/*--------- Tabla de guardar parametro ----------*/

public function testGuardarParametros()
{
$datosPrueba = array(
    
    'Cai' => '20HOLA',
    'Fecha_Ven' => '2023-05-28',
    'Fecha_Emi' => '2023-02-17',
    'Rango_Ini' => '001-001-01-00000100',
    'Rango_Fin' => '001-001-01-00000110',
    'Consecutivo' => '100',
    'Estado' => '1'
);
 // Validamos que no hayan simbolos en los datos
foreach($datosPrueba as $dato) {
if(!preg_match('/^[-a-zA-Z0-9]+$/', $dato)) {
    $this->fail('Uno o más campos contienen símbolos no permitidos.');
}
}
// Validamos que el campo 'Codigo' solo contenga números enteros y decimales
if(!preg_match('/^[a-zA-Z0-9]+$/', $datosPrueba['Codigo'])) {
    $this->fail('El campo "Codigo" solo debe contener números enteros y letras.');
}
// Validamos que el campo 'Fecha_ven' no contenga símbolos ni números
if(!preg_match('/^[0-9: -]+$/', $datosPrueba['Fecha_Ven'])) {
    $this->fail('El campo "Fecha_Ven" no debe contener símbolos no permitidos.');
}
// Validamos que el campo 'Fecha_Emi' no contenga símbolos ni números
if(!preg_match('/^[0-9: -]+$/', $datosPrueba['Fecha_Emi'])) {
    $this->fail('El campo "Fecha_Emi" no debe contener símbolos no permitidos.');
}
// Validamos que el campo 'Rango_Ini' no contenga símbolos ni números
if(!preg_match('/^[0-9: -]+$/', $datosPrueba['Rango_Ini'])) {
    $this->fail('El campo "Rango_Ini" no debe contener símbolos no permitidos.');
}
// Validamos que el campo 'Rango_Fin' no contenga símbolos ni números
if(!preg_match('/^[0-9: -]+$/', $datosPrueba['Rango_Fin'])) {
    $this->fail('El campo "Rango_Fin" no debe contener símbolos no permitidos.');
}
// Validamos que el campo 'Consecutivo' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['Consecutivo'])) {
    $this->fail('El campo "Consecutivo" solo debe contener números enteros.');
}
// Validamos que el campo 'Estado' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['Estado'])) {
    $this->fail('El campo "Estado" solo debe contener números enteros.');
}
// Validamos si algun campo esta vacio
foreach($datosPrueba as $dato) {
    if(empty($dato)) {
        $this->fail('Uno o más campos están vacíos.');
    }
}

$objeto = new GuardarParametros();
$resultado = $objeto->guardarDatos($datosPrueba);

$this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}
 /*--------- Tabla de guardar paseabordar ----------*/

 public function testGuardarPaseabordar()
 {
 $datosPrueba = array(
     
     'Codigo' => '20HOLA',
     'Fecha' => '2023-02-17',
     'Puerta_Embarque' => 'H0L423',
     'Id_Boleto' => '4',
     'Id_Pasajero' => '1'
 );
  // Validamos que no hayan simbolos en los datos
foreach($datosPrueba as $dato) {
 if(!preg_match('/^[-a-zA-Z0-9]+$/', $dato)) {
     $this->fail('Uno o más campos contienen símbolos no permitidos.');
 }
}
// Validamos que el campo 'Codigo' solo contenga números enteros y decimales
if(!preg_match('/^[a-zA-Z0-9]+$/', $datosPrueba['Codigo'])) {
    $this->fail('El campo "Codigo" solo debe contener números enteros y letras.');
}
// Validamos que el campo 'Fecha' no contenga símbolos ni números
if(!preg_match('/^[0-9: -]+$/', $datosPrueba['Fecha'])) {
    $this->fail('El campo "Fecha" no debe contener símbolos no permitidos.');
}
// Validamos que el campo 'Puerta de embarque' solo contenga números enteros y decimales
if(!preg_match('/^[a-zA-Z0-9]+$/', $datosPrueba['Puerta_Embarque'])) {
    $this->fail('El campo "Puerta_Embarque" solo debe contener números enteros y letras.');
}
// Validamos que el campo 'Id_Boleto' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['Id_Boleto'])) {
    $this->fail('El campo "Id_Boleto" solo debe contener números enteros.');
}
// Validamos que el campo 'Id_Pasajero' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['Id_Pasajero'])) {
    $this->fail('El campo "Id_Pasajero" solo debe contener números enteros.');
}
 // Validamos si algun campo esta vacio
 foreach($datosPrueba as $dato) {
     if(empty($dato)) {
         $this->fail('Uno o más campos están vacíos.');
     }
 }

 $objeto = new GuardarPaseabordar();
 $resultado = $objeto->guardarDatos($datosPrueba);

 $this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}
/*--------- Tabla de guardar reserva ----------*/

public function testGuardarReserva()
{
$datosPrueba = array(
    
    'Codigo' => '20HOLA',
    'Id_Vuelo' => '1',
    'Precio' => '200'
);
 // Validamos que no hayan simbolos en los datos
foreach($datosPrueba as $dato) {
if(!preg_match('/^[a-zA-Z0-9]+$/', $dato)) {
    $this->fail('Uno o más campos contienen símbolos no permitidos.');
}
}
// Validamos que el campo 'Codigo' no contenga símbolos ni números
if(!preg_match('/^[a-zA-Z0-9]+$/', $datosPrueba['Codigo'])) {
    $this->fail('El campo "Codigo" no debe contener símbolos ni números.');
}
   // Validamos que el campo 'Id de vuelo' solo contenga números enteros y decimales
   if(!preg_match('/^[0-9]+$/', $datosPrueba['Id_Vuelo'])) {
    $this->fail('El campo "Id_Vuelo" solo debe contener números enteros y decimales.');
}
// Validamos que el campo 'Precio' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+(\.[0-9]+)?$/', $datosPrueba['Precio'])) {
    $this->fail('El campo "Precio" solo debe contener números enteros y decimales.');
}
// Validamos si algun campo esta vacio
foreach($datosPrueba as $dato) {
    if(empty($dato)) {
        $this->fail('Uno o más campos están vacíos.');
    }
}

$objeto = new GuardarReserva();
$resultado = $objeto->guardarDatos($datosPrueba);

$this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}
/*--------- Tabla de guardar usuario ----------*/

public function testGuardarUsuario()
{
$datosPrueba = array(
    
    'Usuario' => 'Prueba',
    'Pass' => '2023',
    'Estado' => '1'
);
 // Validamos que no hayan simbolos en los datos
foreach($datosPrueba as $dato) {
if(!preg_match('/^[a-zA-Z0-9]+$/', $dato)) {
    $this->fail('Uno o más campos contienen símbolos no permitidos.');
}
}
// Validamos que el campo 'Usuario' no contenga símbolos ni números
if(!preg_match('/^[a-zA-Z0-9]+$/', $datosPrueba['Usuario'])) {
    $this->fail('El campo "Usuario" no debe contener símbolos ni números.');
}
// Validamos que el campo 'Pass' no contenga símbolos ni números
if(!preg_match('/^[a-zA-Z0-9]+$/', $datosPrueba['Pass'])) {
    $this->fail('El campo "Pass" no debe contener símbolos ni números.');
}
// Validamos que el campo 'Estado' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['Estado'])) {
    $this->fail('El campo "Estado" solo debe contener números enteros y decimales.');
}
// Validamos si algun campo esta vacio
foreach($datosPrueba as $dato) {
    if(empty($dato)) {
        $this->fail('Uno o más campos están vacíos.');
    }
}

$objeto = new GuardarUsuario();
$resultado = $objeto->guardarDatos($datosPrueba);

$this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}

/*----------- TABLAS PEDRO --------------*/
    /*--------- Tabla de guardar checkin ----------*/

    public function testGuardarcheckin()
    {
    $datosPrueba = array(
        
        'Id_Reserva' => '1',
        'Id_Pasajero' => '1'
    );

    // Validamos si algun campo esta vacio
    foreach($datosPrueba as $dato) {
        if(empty($dato)) {
            $this->fail('Uno o más campos están vacíos.');
        }
    }

    // Validamos que el campo 'Id reserva' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['Id_Reserva'])) {
    $this->fail('El campo "Id_Reserva" solo debe contener números enteros y decimales.');
}
// Validamos que el campo 'Id pasajero' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['Id_Pasajero'])) {
    $this->fail('El campo "Id_Pasajero" solo debe contener números enteros y decimales.');
}
    $objeto = new GuardarCheckin();
    $resultado = $objeto->guardarDatos($datosPrueba);

    $this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}

 /*--------- Tabla de guardar clase ----------*/

 public function testGuardarclase()
 {
 $datosPrueba = array(
     
     'Tipo_Clase' => 'Economico',
     'Descripcion' => 'Gran Bistek',
     'MultiplicadorPrecio' => '2.5'
 );

 // Validamos si algun campo esta vacio
 foreach($datosPrueba as $dato) {
     if(empty($dato)) {
         $this->fail('Uno o más campos están vacíos.');
     }
 }

 // Validamos que el campo 'Tipo de clase' no contenga símbolos ni números
if(!preg_match('/^[a-zA-Z]+$/', $datosPrueba['Tipo_Clase'])) {
    $this->fail('El campo "Tipo_Clase" no debe contener símbolos ni números.');
}
// Validamos que el campo 'Descripcion' no contenga símbolos ni números
if(!preg_match('/^[a-zA-Z]+$/', $datosPrueba['Descripcion'])) {
    $this->fail('El campo "Descripcion" no debe contener símbolos ni números.');
}
// Validamos que el campo 'Multiplicador de Precio' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+(\.[0-9]+)?$/', $datosPrueba['MultiplicadorPrecio'])) {
    $this->fail('El campo "MultiplicadorPrecio" solo debe contener números enteros y decimales.');
}
 $objeto = new GuardarClase();
 $resultado = $objeto->guardarDatos($datosPrueba);

 $this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}

/*--------- Tabla de guardar detallefactura ----------*/
public function testGuardardetallefactura()
{
$datosPrueba = array(
    
    `Id_Detalle` =>'',
    'Id_Boleto' =>'',
    'Cantidad' =>'',
    'Descripcion' =>'',
    'Subtotal' =>'',
    'Total_Descuento' =>'',
    'Total_Impuesto' =>'',
    'Total' =>'',
    'Estado' =>''
);

// Validamos si algun campo esta vacio
foreach($datosPrueba as $dato) {
    if(empty($dato)) {
        $this->fail('Uno o más campos están vacíos.');
    }
}

// Validamos que el campo 'Id detalle' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['Id_Detalle'])) {
    $this->fail('El campo "Id_Detalle" solo debe contener números enteros y decimales.');
}
// Validamos que el campo 'Id boleto' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['Id_Boleto'])) {
    $this->fail('El campo "Id_Boleto" solo debe contener números enteros y decimales.');
}
// Validamos que el campo 'Cantidad' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['Cantidad'])) {
    $this->fail('El campo "Cantidad" solo debe contener números enteros y decimales.');
}
// Validamos que el campo 'Descripcion' no contenga símbolos ni números
if(!preg_match('/^[a-zA-Z]+$/', $datosPrueba['Descripcion'])) {
    $this->fail('El campo "Descripcion" no debe contener símbolos ni números.');
}
// Validamos que el campo 'Sub total' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+(\.[0-9]+)?$/', $datosPrueba['SubTotal'])) {
    $this->fail('El campo "SubTotal" solo debe contener números enteros y decimales.');
}
// Validamos que el campo 'Total descuento' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+(\.[0-9]+)?$/', $datosPrueba['Total_Descuento'])) {
    $this->fail('El campo "Total_Descuento" solo debe contener números enteros y decimales.');
}
// Validamos que el campo 'Total impuesto' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+(\.[0-9]+)?$/', $datosPrueba['Total_Impuesto'])) {
    $this->fail('El campo "Total_Impuesto" solo debe contener números enteros y decimales.');
}
// Validamos que el campo 'Total' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+(\.[0-9]+)?$/', $datosPrueba['Total'])) {
    $this->fail('El campo "Total" solo debe contener números enteros y decimales.');
}
// Validamos que el campo 'Estado' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['Estado'])) {
    $this->fail('El campo "Estado" solo debe contener números enteros y decimales.');
}
$objeto = new GuardarDetallefactura();
$resultado = $objeto->guardarDatos($datosPrueba);

$this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}

/*--------- Tabla de guardar factura ----------*/
public function testGuardarfactura()
{
$datosPrueba = array(
    
    `Id_Parametro` =>'a',
    'Codigo' =>'a',
    'RTN' =>'a',
    'CAI' =>'a',
    'Id_Detalle' =>'A',
    'Fecha' =>'hola',
    'Id_Moneda' =>'a',
    'Monto' =>'a',
    'Metodo_Pago' =>'a',
    'Cantidad_Efectvio' =>'a',
    'Numero_Tarjeta' =>'a'
);

// Validamos si algun campo esta vacio
foreach($datosPrueba as $dato) {
    if(empty($dato)) {
        $this->fail('Uno o más campos están vacíos.');
    }
}
// Validamos que el campo 'Id parametro' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['Id_Parametro'])) {
    $this->fail('El campo "Id_Parametro" solo debe contener números enteros y decimales.');
}
// Validamos que el campo 'Codigo' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['Codigo'])) {
    $this->fail('El campo "Id_Parametro" solo debe contener números enteros y decimales.');
}
// Validamos que el campo 'RTN' solo contenga números enteros y decimales
if(!preg_match('/^[0-9]+$/', $datosPrueba['RTN'])) {
    $this->fail('El campo "RTN" solo debe contener números enteros y decimales.');
}
$objeto = new Guardarfactura();
$resultado = $objeto->guardarDatos($datosPrueba);

$this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}

/*--------- Tabla de guardar hangar ----------*/
public function testGuardarhangar()
{
$datosPrueba = array(
    
    `Codigo` =>'',
    'Capacidad' =>'',
    'Id_Aeronave' =>'',
    'Id_Aeropuerto' =>''
);

// Validamos si algun campo esta vacio
foreach($datosPrueba as $dato) {
    if(empty($dato)) {
        $this->fail('Uno o más campos están vacíos.');
    }
}

$objeto = new Guardarhangar();
$resultado = $objeto->guardarDatos($datosPrueba);

$this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}

/*--------- Tabla de guardar pasajero ----------*/
public function testGuardarpasajero()
{
$datosPrueba = array(
    `Nombre` =>'',
    'Tipo_Documento' =>'',
    'Numero_Documento' =>'',
    'Telefono' =>'',
    'Correo' =>'',
    'Id_Pais' =>'',
    'Fecha_Nacimiento' =>''
    
);

// Validamos si algun campo esta vacio
foreach($datosPrueba as $dato) {
    if(empty($dato)) {
        $this->fail('Uno o más campos están vacíos.');
    }
}

$objeto = new Guardarpasajero();
$resultado = $objeto->guardarDatos($datosPrueba);

$this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}

/*--------- Tabla de guardar personaltierra ----------*/
public function testGuardarpersonaltierra()
{
$datosPrueba = array(
    `Carga_Academica` =>'',
    'Cargo' =>''

);

// Validamos si algun campo esta vacio
foreach($datosPrueba as $dato) {
    if(empty($dato)) {
        $this->fail('Uno o más campos están vacíos.');
    }
}

$objeto = new Guardarpersonaltierra();
$resultado = $objeto->guardarDatos($datosPrueba);

$this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}

/*--------- Tabla de guardar tripulacion ----------*/
public function testGuardartripulacion()
{
$datosPrueba = array(
    'Cargo' =>'',
    'Horas_Vuelo' =>'',
    'Tipo_Licencia' =>'',
    'Academia' =>''
   
);

// Validamos si algun campo esta vacio
foreach($datosPrueba as $dato) {
    if(empty($dato)) {
        $this->fail('Uno o más campos están vacíos.');
    }
}

$objeto = new Guardartripulacion();
$resultado = $objeto->guardarDatos($datosPrueba);

$this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}

/* FIN DEL METODO GUARDAR */
/* ------------------------------------------------------------------*/
/* INICIO DEL METODO ELIMINAR */

/* ------------  METODO ELIMINAR PAIS --------------- */

public function testEliminarPais()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";

  // Conectar a la base de datos de prueba.
  $conn = new mysqli($servername, $username, $password, $database);

  // Obtener el ID del registro insertado.
  $id = $conn->insert_id;

  // Validar que existe un registro con el ID proporcionado.
 $validacion = "SELECT * FROM pais WHERE Id_Pais='56'";
 $resultadoValidacion = $conn->query($validacion);
 if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
 }

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM pais WHERE Id_Pais='56'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}
/*------------ METODO ELIMINAR AERONAVE ---------------- */
public function testEliminarAeronave()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";

  // Conectar a la base de datos de prueba.
  $conn = new mysqli($servername, $username, $password, $database);

  // Obtener el ID del registro insertado.
  $id = $conn->insert_id;

   // Validar que existe un registro con el ID proporcionado.
  $validacion = "SELECT * FROM aeronave WHERE Id_Aeronave='74'";
  $resultadoValidacion = $conn->query($validacion);

  if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM aeronave WHERE Id_Aeronave='74'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}

/*------------ METODO ELIMINAR AEROPUERTO ---------------- */



public function testEliminarAeropuerto()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";

  // Conectar a la base de datos de prueba.
  $conn = new mysqli($servername, $username, $password, $database);

  // Obtener el ID del registro insertado.
  $id = $conn->insert_id;

   // Validar que existe un registro con el ID proporcionado.
  $validacion = "SELECT * FROM aeropuerto WHERE Id_Aeropuerto='53'";
  $resultadoValidacion = $conn->query($validacion);
  if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
  }

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM aeropuerto WHERE Id_Aeropuerto='53'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}


/* ---------------- METODO ELIMINAR MONEDA -------------*/

public function testEliminarMoneda()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";

  // Conectar a la base de datos de prueba.
  $conn = new mysqli($servername, $username, $password, $database);

  // Obtener el ID del registro insertado.
  $id = $conn->insert_id;

   // Validar que existe un registro con el ID proporcionado.
$validacion = "SELECT * FROM moneda WHERE Id_Moneda='62'";
$resultadoValidacion = $conn->query($validacion);
 
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}
  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM moneda WHERE Id_Moneda='62'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}


/* ---------------- METODO ELIMINAR REGION -------------*/


public function testEliminarRegion()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";

  // Conectar a la base de datos de prueba.
  $conn = new mysqli($servername, $username, $password, $database);

  // Obtener el ID del registro insertado.
  $id = $conn->insert_id;
   // Validar que existe un registro con el ID proporcionado.
 $validacion = "SELECT * FROM region WHERE Id_Region='18'";
 $resultadoValidacion = $conn->query($validacion);
  if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
 }

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM region WHERE Id_Region='18'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}
/*----------- ELIMINAR EDUARDO --------------*/
/* ------------  METODO ELIMINAR BOLETO --------------- */

public function testEliminarBoleto()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";


  // Conectar a la base de datos de prueba.
  $conn = new mysqli($servername, $username, $password, $database);

  // Obtener el ID del registro insertado.
  $id = $conn->insert_id;
  // Validar que existe un registro con el ID proporcionado.
$validacion = "SELECT * FROM boleto WHERE Id_Boleto='28'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM boleto WHERE Id_Boleto='28'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}

/* ------------  METODO ELIMINAR CIUDAD --------------- */

public function testEliminarCiudad()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";


  // Conectar a la base de datos de prueba.
  $conn = new mysqli($servername, $username, $password, $database);

  // Obtener el ID del registro insertado.
  $id = $conn->insert_id;
  // Validar que existe un registro con el ID proporcionado.
$validacion = "SELECT * FROM ciudad WHERE Id_Ciudad='25'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM ciudad WHERE Id_Ciudad='25'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}

/* ------------  METODO ELIMINAR EQUIPAJE --------------- */

public function testEliminarEquipaje()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";


  // Conectar a la base de datos de prueba.
  $conn = new mysqli($servername, $username, $password, $database);

  // Obtener el ID del registro insertado.
  $id = $conn->insert_id;
  // Validar que existe un registro con el ID proporcionado.
$validacion = "SELECT * FROM equipaje WHERE Id_Equipaje='23'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM equipaje WHERE Id_Equipaje='23'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}

/* ------------  METODO ELIMINAR VUELO --------------- */

public function testEliminarVuelo()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";


  // Conectar a la base de datos de prueba.
  $conn = new mysqli($servername, $username, $password, $database);

  // Obtener el ID del registro insertado.
  $id = $conn->insert_id;
  // Validar que existe un registro con el ID proporcionado.
$validacion = "SELECT * FROM vuelo WHERE Id_Vuelo='15'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM vuelo WHERE Id_Vuelo='15'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}

/* ------------  METODO ELIMINAR PARAMETRO --------------- */

public function testEliminarParametro()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";


  // Conectar a la base de datos de prueba.
  $conn = new mysqli($servername, $username, $password, $database);

  // Obtener el ID del registro insertado.
  $id = $conn->insert_id;
  // Validar que existe un registro con el ID proporcionado.
$validacion = "SELECT * FROM parametro WHERE Id_Parametro='17'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM parametro WHERE Id_Parametro='17'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}

/* ------------  METODO ELIMINAR PASEABORDAR --------------- */

public function testEliminarPaseabordar()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";


  // Conectar a la base de datos de prueba.
  $conn = new mysqli($servername, $username, $password, $database);

  // Obtener el ID del registro insertado.
  $id = $conn->insert_id;
  // Validar que existe un registro con el ID proporcionado.
$validacion = "SELECT * FROM paseabordar WHERE Id_Pase='15'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM paseabordar WHERE Id_Pase='15'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}

/* ------------  METODO ELIMINAR RESERVA --------------- */

public function testEliminarReserva()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";


  // Conectar a la base de datos de prueba.
  $conn = new mysqli($servername, $username, $password, $database);

  // Obtener el ID del registro insertado.
  $id = $conn->insert_id;
  // Validar que existe un registro con el ID proporcionado.
$validacion = "SELECT * FROM reserva WHERE Id_Reserva='17'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM reserva WHERE Id_Reserva='17'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}

/* ------------  METODO ELIMINAR USUARIO --------------- */

public function testEliminarUsuario()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";


  // Conectar a la base de datos de prueba.
  $conn = new mysqli($servername, $username, $password, $database);

  // Obtener el ID del registro insertado.
  $id = $conn->insert_id;
  // Validar que existe un registro con el ID proporcionado.
$validacion = "SELECT * FROM usuario WHERE idUser='26'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM usuario WHERE idUser='26'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}

/* INICIO DE TABLAS PEDRO DEL METODO ELIMINAR */

/* ------------  METODO ELIMINAR CHECKIN --------------- */

public function testEliminarcheckin()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";

  // Conectar a la base de datos de prueba.
  $conn = new mysqli($servername, $username, $password, $database);

  // Obtener el ID del registro insertado.
  $id = $conn->insert_id;
   // Validar que existe un registro con el ID proporcionado.
$validacion = "SELECT * FROM checkin WHERE Id_Checkin='2'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM checkin WHERE Id_Checkin='2'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}

/* ------------  METODO ELIMINAR CLASE --------------- */

public function testEliminarclase()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";

  // Conectar a la base de datos de prueba.
  $conn = new mysqli($servername, $username, $password, $database);

  // Obtener el ID del registro insertado.
  $id = $conn->insert_id;
   // Validar que existe un registro con el ID proporcionado.
$validacion = "SELECT * FROM clase WHERE Id_Clase='2'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM clase WHERE Id_Clase='2'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}

/* ------------  METODO ELIMINAR DETALLEFACTURA --------------- */

public function testEliminardetallefactura()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";

  // Conectar a la base de datos de prueba.
  $conn = new mysqli($servername, $username, $password, $database);

  // Obtener el ID del registro insertado.
  $id = $conn->insert_id;
   // Validar que existe un registro con el ID proporcionado.
$validacion = "SELECT * FROM detallefactura WHERE Id_Detalle='15'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM detallefactura WHERE Id_Detalle='15'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}

/* ------------  METODO ELIMINAR FACTURA --------------- */

public function testEliminarfactura()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";

  // Conectar a la base de datos de prueba.
  $conn = new mysqli($servername, $username, $password, $database);

  // Obtener el ID del registro insertado.
  $id = $conn->insert_id;
   // Validar que existe un registro con el ID proporcionado.
$validacion = "SELECT * FROM factura WHERE Id_Factura='19'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM factura WHERE Id_Factura='19'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}

/* ------------  METODO ELIMINAR HANGAR --------------- */

public function testEliminarhangar()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";

  // Conectar a la base de datos de prueba.
  $conn = new mysqli($servername, $username, $password, $database);

  // Obtener el ID del registro insertado.
  $id = $conn->insert_id;
   // Validar que existe un registro con el ID proporcionado.
$validacion = "SELECT * FROM hangar WHERE Id_hangar='2'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM hangar WHERE Id_hangar='2'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}

/* ------------  METODO ELIMINAR PASAJERO --------------- */

public function testEliminarpasajero()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";

  // Conectar a la base de datos de prueba.
  $conn = new mysqli($servername, $username, $password, $database);

  // Obtener el ID del registro insertado.
  $id = $conn->insert_id;
   // Validar que existe un registro con el ID proporcionado.
$validacion = "SELECT * FROM pasajero WHERE Id_Pasajero='1'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM pasajero WHERE Id_Pasajero='1'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}

/* ------------  METODO ELIMINAR PERSONALTIERRA --------------- */

public function testEliminarpersonaltierra()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";

  // Conectar a la base de datos de prueba.
  $conn = new mysqli($servername, $username, $password, $database);

  // Obtener el ID del registro insertado.
  $id = $conn->insert_id;
   // Validar que existe un registro con el ID proporcionado.
$validacion = "SELECT * FROM personaltierra WHERE Id_Personal='1'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM personaltierra WHERE Id_Personal='1'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}

/* ------------  METODO ELIMINAR TRIPULACION --------------- */

public function testEliminartripulacion()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";

  // Conectar a la base de datos de prueba.
  $conn = new mysqli($servername, $username, $password, $database);

  // Obtener el ID del registro insertado.
  $id = $conn->insert_id;
   // Validar que existe un registro con el ID proporcionado.
$validacion = "SELECT * FROM tripulacion WHERE Id_Tripulacion='2'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM tripulacion WHERE Id_Tripulacion='2'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}
/* ------------------------------------------------------------------*/
/* INICIO DEL METODO EDITAR O ACTUALIZAR */

/* PRUEBA: EDITAR TABLA PAIS */

public function testActualizarPais()
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $nombre = 'asjjs';
    $region = 'sdss';
    $id = '67';

     // Verificar si el registro existe en la base de datos
     $existe = $conexion->query("SELECT Id_Pais FROM pais WHERE Id_Pais = '$id'");
     $this->assertNotEquals(0, $existe->num_rows, "El registro con Id_Pais $id no existe");

    $this->assertNotEmpty($nombre);
    $this->assertNotEmpty($region);
    $this->assertNotEmpty($id);
    $actualizar = "UPDATE pais SET Nombre='$nombre', Region='$region' WHERE Id_Pais='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(22, $resultado);
}




/*------------- EDITAR REGION --------------*/

public function testActualizarRegion()
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $nombre = 'los chinitos';
    $id = '35';
    // Verificar si el registro existe en la base de datos
    $existe = $conexion->query("SELECT Id_Region FROM region WHERE Id_Region = '$id'");
    $this->assertNotEquals(0, $existe->num_rows, "El registro con Id_Region $id no existe");

   $this->assertNotEmpty($nombre);
   $this->assertNotEmpty($id);
    $actualizar = "UPDATE region SET Nombre='$nombre' WHERE Id_Region='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(35, $resultado);
}




/*------------- EDITAR AEROPUERTO ----------- */
public function testActualizarAeropuerto()
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $nombre = 'faraonloveshady';
    $hangar ='123';
    $id_ciudad = '2';
    $id = '67';

    // Verificar si el registro existe en la base de datos
    $existe = $conexion->query("SELECT Id_Aeropuerto FROM aeropuerto WHERE Id_Aeropuerto = '$id'");
    $this->assertNotEquals(0, $existe->num_rows, "El registro con Id_Aeropuerto $id no existe");

   $this->assertNotEmpty($nombre);
   $this->assertNotEmpty($hangar);
   $this->assertNotEmpty($id_ciudad);
   $this->assertNotEmpty($id);
    $actualizar = "UPDATE aeropuerto SET Nombre='$nombre',Hangar='$hangar',Id_Ciudad='$id_ciudad' WHERE Id_Aeropuerto='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(4, $resultado);
}


/*------------- EDITAR AERONAVE ----------- */

public function testActualizarAeronave()
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $matricula = 'DJ BIMBO';
    $modelo ='todos';
    $capacidad = '2';
    $tamaño = '1234';
    $tipo='hh';
    $area= 'as';
    $id='18';

    // Verificar si el registro existe en la base de datos
    $existe = $conexion->query("SELECT Id_Aeronave FROM aeronave WHERE Id_Aeronave = '$id'");
    $this->assertNotEquals(0, $existe->num_rows, "El registro con Id_Aeronave $id no existe");

   $this->assertNotEmpty($matricula);
   $this->assertNotEmpty($modelo);
   $this->assertNotEmpty($capacidad);
   $this->assertNotEmpty($tamaño);
   $this->assertNotEmpty($tipo);
   $this->assertNotEmpty($area);
   $this->assertNotEmpty($id);
    $actualizar = "UPDATE aeronave SET Matricula='$matricula', Modelo='$modelo',
    Capacidad = '$capacidad',Tamaño = '$tamaño',Tipo = '$tipo', Area = '$area' WHERE Id_Aeronave='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(19, $resultado);
}
/*------------- EDITAR MONEDA ----------- */

public function testActualizarMoneda()
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $nombre = 'q pedo';
    $conversion ='4.09';
    $id='11';

    // Verificar si el registro existe en la base de datos
    $existe = $conexion->query("SELECT Id_Moneda FROM moneda WHERE Id_Moneda = '$id'");
    $this->assertNotEquals(0, $existe->num_rows, "El registro con Id_Moneda $id no existe");

   $this->assertNotEmpty($nombre);
   $this->assertNotEmpty($conversion);
   $this->assertNotEmpty($id);
    
    $actualizar = "UPDATE moneda SET Nombre='$nombre', ConversionADolar='$conversion'
    WHERE Id_Moneda='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(4, $resultado);
}
/* EDITAR EDUARDO*/
/* PRUEBA: EDITAR TABLA BOLETO */

public function testActualizarBoleto() 
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $codigo = 'C4MBI0';
    $id_Asiento = '12';
    $id_Pasajero = '1';
    $id_Vuelo = '1';
    $id_Equipaje = '1';
    $id_Clase = '1';
    $precio = '400';
    $estado = '1';
    $id = '29';
 
    $actualizar = "UPDATE boleto SET Codigo='$codigo', Id_Asiento='$id_Asiento', Id_Pasajero='$id_Pasajero', 
    Id_Vuelo='$id_Vuelo', Id_Equipaje='$id_Equipaje', Id_Clase='$id_Clase', Precio='$precio', Estado='$estado' WHERE Id_Boleto='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(29, $resultado);
}
/* PRUEBA: EDITAR TABLA CIUDAD */

public function testActualizarCiudad() 
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $nombre = 'cambio';
    $codigo = '2023';
    $terminal = '12';
    $id_Pais = '1';
    $id = '27';
 
    $actualizar = "UPDATE ciudad SET Nombre='$nombre', Codigo='$codigo', Terminal='$terminal', Id_Pais='$id_Pais' WHERE Id_Ciudad='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(27, $resultado);
}
/* PRUEBA: EDITAR TABLA EQUIPAJE */

public function testActualizarEquipaje() 
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $peso = '40';
    $cantidad = '2';
    $multiplicador = '0.25';
    $id = '27';
 
    $actualizar = "UPDATE equipaje SET Peso='$peso', Cantidad='$cantidad', MultiplicadorPrecio='$multiplicador' WHERE Id_Equipaje='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(27, $resultado);
}
/* PRUEBA: EDITAR TABLA VUELO */

public function testActualizarVuelo() 
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $codigo = 'EDU203';
    $lugar_sal = 'mi casa';
    $lugar_lle = 'ujcv';
    $hora_sal = '14:17:00';
    $hora_lle = '16:30:00';
    $fecha = '2023/02/17';
    $precio = '150';
    $id_Aeronave = '20';
    $id = '29';
 
    $actualizar = "UPDATE vuelo SET Codigo='$codigo', Lugar_salida='$lugar_sal', Lugar_LLegada='$lugar_lle', Hora_Salida='$hora_sal', Hora_LLegada='$hora_lle', Fecha='$fecha', Precio='$precio', Id_Aeronave='$id_Aeronave'  WHERE Id_Vuelo='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(29, $resultado);
}
/* PRUEBA: EDITAR TABLA PARAMETRO */

public function testActualizarParametro() 
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $cai = 'EDU203';
    $fecha_Ven = '2023-05-12';
    $fecha_Emi = '2023-02-17';
    $rango_Ini = '001-001-01-00000100';
    $rango_Fin = '001-001-01-00000110';
    $consecutivo = '100';
    $estado = '1';
    $id = '31';
 
    $actualizar = "UPDATE parametro SET Cai='$cai', Fecha_Ven='$fecha_Ven', Fecha_Emi='$fecha_Emi', Rango_Ini='$rango_Ini', Rango_Fin='$rango_Fin', Consecutivo='$consecutivo', Estado='$estado'  WHERE Id_Parametro='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(31, $resultado);
}
/* PRUEBA: EDITAR TABLA PASEABORDAR */

public function testActualizarPaseabordar() 
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $codigo = 'EDU203';
    $fecha = '2023-02-17';
    $puerta_Embarque = '3312XD';
    $id_Boleto = '4';
    $id_Pasajero = '4';
    $id = '30';
 
    $actualizar = "UPDATE paseabordar SET Codigo='$codigo', Fecha='$fecha', Puerta_Embarque='$puerta_Embarque', Id_Boleto='$id_Boleto', Id_Pasajero='$id_Pasajero'  WHERE Id_Pase='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(30, $resultado);
}
/* PRUEBA: EDITAR TABLA RESERVA */

public function testActualizarReserva() 
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $codigo = 'EDU203';
    $id_Vuelo = '2';
    $precio = '500';
    $id = '29';
 
    $actualizar = "UPDATE reserva SET Codigo='$codigo', Id_Vuelo='$id_Vuelo', Precio='$precio'  WHERE Id_Reserva='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(29, $resultado);
}
/* PRUEBA: EDITAR TABLA USUARIO */

public function testActualizarUsuario() 
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $usuario = 'EDU2023';
    $pass = '2023';
    $estado = '1';
    $id = '40';
 
    $actualizar = "UPDATE usuario SET Usuario='$usuario', Pass='$pass', Estado='$estado'  WHERE idUser='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(40, $resultado);
}

/* INICIO DE TABLAS DE PEDRO DEL METODO EDITAR O ACTUALIZAR */

/* PRUEBA: EDITAR TABLA CHECKIN */

public function testActualizarcheckin()
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $Id_Reserva = '4';
    $Id_Pasajero ='1';
    $id='2';
    $actualizar = "UPDATE checkin SET Id_Reserva='$Id_Reserva', Id_Pasajero='$Id_Pasajero'
    WHERE Id_Checkin='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(4, $resultado);
}

/* PRUEBA: EDITAR TABLA CLASE */

public function testActualizarclase()
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $Tipo_Clase = 'Turista';
    $Descripcion ='Sandwich';
    $MultiplicadorPrecio ='1';
    $id='1';
    $actualizar = "UPDATE clase SET Tipo_Clase='$Tipo_Clase', Descripcion='$Descripcion',MultiplicadorPrecio='$MultiplicadorPrecio'
    WHERE Id_Clase='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(4, $resultado);
}

/* PRUEBA: EDITAR TABLA DETALLEFACTURA */

public function testActualizardetallefactura()
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $Id_Boleto = '4';
    $Cantidad ='2';
    $Descripcion ='Detalle de boletos con codigo PAP2594';
    $Subtotal ='400.0';
    $Total_Descuento ='40.0';
    $Total_Impuesto ='60.75';
    $Total ='430.75';
    $Estado ='2';
    $id='13';
    $actualizar = "UPDATE detallefactura SET Id_Boleto='$Id_Boleto', Cantidad='$Cantidad',Descripcion='$Descripcion',Subtotal='$Subtotal',Total_Descuento='$Total_Descuento',Total_Impuesto='$Total_Impuesto',Total='$Total',Estado='$Estado'
    WHERE Id_Detalle='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(4, $resultado);
}

/* PRUEBA: EDITAR TABLA FACTURA */

public function testActualizarfactura()
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $Id_Parametro = '6';
    $Codigo = '001-001-01-00000200';
    $RTN = '08011994110749';
    $CAI = '123456789';
    $Id_Detalle = '13';
    $Fecha = '11/02/23';
    $Id_Moneda = '1';
    $Monto = '430.75';
    $Metodo_Pago = 'Tarjeta';
    $Cantidad_Efectivo = '0';
    $Numero_Tarjeta ='3344-3757-1820';
    $id='19';
    $actualizar = "UPDATE factura SET Id_Parametro='$Id_Parametro', Codigo='$Codigo',RTN='$RTN',CAI='$CAI',iD_Detalle='$Id_Detalle',Fecha='$Fecha',Id_Moneda='$Id_Moneda',Monto='$Monto',Metodo_Pago='$Metodo_Pago',Cantidad_Efectivo='$Cantidad_Efectivo',Numero_Tarjeta='$Numero_Tarjeta'
    WHERE Id_Factura='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(4, $resultado);
}

/* PRUEBA: EDITAR TABLA HANGAR */

public function testActualizarhangar()
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $Codigo = 'A001';
    $Capacidad ='5';
    $Id_Aeronave ='18';
    $Id_Aeropuerto ='2';
    $id='1';
    $actualizar = "UPDATE hangar SET Codigo='$Codigo', Capacidad='$Capacidad',Id_Aeronave='$Id_Aeronave',Id_Aeropuerto='$Id_Aeropuerto'
    WHERE Id_hangar='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(4, $resultado);
}

/* PRUEBA: EDITAR TABLA PASAJERO */

public function testActualizarpasajero()
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $Nombre = 'Calvito ';
    $Tipo_Documento = 'DNI';
    $Numero_Documento = '0801200073000';
    $Telefono = '96551821';
    $Correo = 'estoyharto@deesto.hn';
    $Id_Pais = '1';
    $Fecha_Nacimiento ='29/02/2000';
    $id='1';
    $actualizar = "UPDATE pasajero SET Nombre='$Nombre', Tipo_Documento='$Tipo_Documento',Numero_Documento='$Numero_Documento',Telefono='$Telefono',Correo='$Correo',Id_Pais='$Id_Pais',Fecha_Nacimiento='$Fecha_Nacimiento'
    WHERE Id_Pasajero='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(4, $resultado);
}

/* PRUEBA: EDITAR TABLA PERSONALTIERRA */

public function testActualizarpersonaltierra()
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $Carga_Academica = 'akndsjdb';
    $Cargo ='4.09';
    $id='1';
    $actualizar = "UPDATE personaltierra SET Carga_Academica='$Carga_Academica', Cargo='$Cargo'
    WHERE Id_Personal='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(4, $resultado);
}

/* PRUEBA: EDITAR TABLA TRIPULACION */

public function testActualizartripulacion()
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $Cargo = 'Piloto';
    $Horas_Vuelo ='500';
    $Tipo_Licencia ='Superior';
    $Academia ='A.C.A';
    $id='2';
    $actualizar = "UPDATE tripulacion SET Nombre='$nombre', ConversionADolar='$conversion'
    WHERE Id_Tripulacion='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(4, $resultado);
}
/* ------------------------------------------------------ */
/* ----------------------- MÉTODO DE LISTAR -----------------------------*/
/* --------------PRUEBAS MARCELA : TABLA LISTAR PAISES ---------------- */

public function testSelectAllPais()
    {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";
        $conexion = new mysqli($servername, $username, $password, $database);

        // Ejecutar el query
        $resultado = mysqli_query($conexion, "SELECT * FROM pais");

        // Verificar que el resultado es un objeto mysqli_result válido
        $this->assertInstanceOf(mysqli_result::class, $resultado);

      
        // Imprimir los resultados en una tabla HTML
     echo '<table>';
     echo '<tr><th>ID</th><th>Nombre</th><th>Region</th></tr>';
     while ($fila = mysqli_fetch_assoc($resultado)) {
    echo '<tr><td>' . $fila['Id_Pais'] . '</td><td>' . $fila['Nombre'] . '</td><td>' . $fila['Region'] . '</td></tr>';
    }
    echo '</table>';
       
        // Liberar los recursos
        mysqli_free_result($resultado);
        mysqli_close($conexion);
}




/* --------------PRUEBAS MARCELA : TABLA LISTAR Aeropuerto ---------------- */
public function testListarAeropuerto()
    {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";
        $conexion = new mysqli($servername, $username, $password, $database);

        // Ejecutar el query
        $resultado = mysqli_query($conexion, "SELECT * FROM aeropuerto");

        // Verificar que el resultado es un objeto mysqli_result válido
        $this->assertInstanceOf(mysqli_result::class, $resultado);

      
        // Imprimir los resultados en una tabla HTML
     echo '<table>';
     echo '<tr>
       ------------------- AEROPUERTOS --------------
     <th> ID AEROPUERTO </th> <th> NOMBRE </th> <th>HANGAR</th> <th> ID CIUDAD </th> 
     </tr>';
     while ($fila = mysqli_fetch_assoc($resultado)) {
    echo '--' . $fila['Id_Aeropuerto'] . '--' 
    . $fila['Nombre'] . '--' 
    . $fila['Hangar'] . '--' 
    . $fila['Id_Ciudad'] . '</td></tr>';
    }
    echo '</table>';
       
        // Liberar los recursos
        mysqli_free_result($resultado);
        mysqli_close($conexion);
    }




/* --------------PRUEBAS MARCELA : TABLA LISTAR AERONAVE ---------------- */

public function testListarAeronave()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM aeronave");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------AERONAVES -------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id de aeronave: ' . $fila['Id_Aeronave'] ."\n" .
        'Matricula: '  . $fila['Matricula'] .  "\n" .
        'Modelo: ' . $fila['Modelo'] . "\n" .
        'Capacidad: '  . $fila['Capacidad'] ."\n" .
        'Tamaño:'. $fila['Tamaño'] ."\n" .
        'Tipo:' . $fila['Tipo'] ."\n" .
        'Area: ' . $fila['Area'] . "\n" .
        
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);

}

/* --------------PRUEBAS MARCELA : TABLA LISTAR MONEDA ---------------- */

public function testListarMoneda()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM moneda");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------MONEDAS -------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id de moneda: ' . $fila['Id_Moneda'] ."\n" .
        'Nombre: '  . $fila['Nombre'] .  "\n" .
        'Conversion: ' . $fila['ConversionADolar'] . "\n" .
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);



}
/* --------------PRUEBAS MARCELA : TABLA LISTAR REGION ---------------- */



public function testListarRegion()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM region");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------REGIONES -------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id de región: ' . $fila['Id_Region'] ."\n" .
        'Nombre: '  . $fila['Nombre'] .  "\n" .
       
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);

}

/* --------------PRUEBAS EDUARDO : TABLA LISTAR BOLETO ---------------- */

public function testListarBoleto()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM boleto");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------BOLETOS-------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id del Boleto: ' . $fila['Id_Boleto'] ."\n" .
        'Codigo: '  . $fila['Codigo'] .  "\n" .
        'Id del Asiento: '  . $fila['Id_Asiento'] .  "\n" .
        'Id de Pasajero: '  . $fila['Id_Pasajero'] .  "\n" .
        'Id de Vuelo: '  . $fila['Id_Vuelo'] .  "\n" .
        'Id de Equipaje: '  . $fila['Id_Equipaje'] .  "\n" .
        'Id de Clase: '  . $fila['Id_Clase'] .  "\n" .
        'Precio: '  . $fila['Precio'] .  "\n" .
        'Estado: '  . $fila['Estado'] .  "\n" .
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);



}
/* --------------PRUEBAS EDUARDO : TABLA LISTAR CIUDAD ---------------- */

public function testListarCiudad()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM ciudad");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------CIUDAD-------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id de la Ciudad: ' . $fila['Id_Ciudad'] ."\n" .
        'Nombre: '  . $fila['Nombre'] .  "\n" .
        'Codigo: '  . $fila['Codigo'] .  "\n" .
        'Terminal: '  . $fila['Terminal'] .  "\n" .
        'Id de Pais: '  . $fila['Id_Pais'] .  "\n" .
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);



}
/* --------------PRUEBAS EDUARDO : TABLA LISTAR EQUIPAJE ---------------- */

public function testListarEquipaje()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM equipaje");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------EQUIPAJE-------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id del Equipaje: ' . $fila['Id_Equipaje'] ."\n" .
        'Peso: '  . $fila['Peso'] .  "\n" .
        'Cantidad: '  . $fila['Cantidad'] .  "\n" .
        'Multiplicador de Precio: '  . $fila['MultiplicadorPrecio'] .  "\n" .
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);



}
/* --------------PRUEBAS EDUARDO : TABLA LISTAR VUELO ---------------- */

public function testListarVuelo()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM vuelo");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------VUELO-------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id del Vuelo: ' . $fila['Id_Vuelo'] ."\n" .
        'Codigo: '  . $fila['Codigo'] .  "\n" .
        'Lugar de Salida: '  . $fila['Lugar_Salida'] .  "\n" .
        'Lugar de LLegada: '  . $fila['Lugar_LLegada'] .  "\n" .
        'Hora de Salida: '  . $fila['Hora_Salida'] .  "\n" .
        'Hora de LLegada: '  . $fila['Hora_LLegada'] .  "\n" .
        'Fecha: '  . $fila['Fecha'] .  "\n" .
        'Precio: '  . $fila['Precio'] .  "\n" .
        'Id de Aeronave: '  . $fila['Id_Aeronave'] .  "\n" .
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);



}
/* --------------PRUEBAS EDUARDO : TABLA LISTAR PARAMETRO ---------------- */

public function testListarParametro()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM parametro");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------PARAMETRO-------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id del Parametro: ' . $fila['Id_Parametro'] ."\n" .
        'Cai: '  . $fila['Cai'] .  "\n" .
        'Fecha de vencimiento: '  . $fila['Fecha_Ven'] .  "\n" .
        'Fecha de emicion: '  . $fila['Fecha_Emi'] .  "\n" .
        'Rango de inicio: '  . $fila['Rango_Ini'] .  "\n" .
        'Rango final: '  . $fila['Rango_Fin'] .  "\n" .
        'Consecutivo: '  . $fila['Consecutivo'] .  "\n" .
        'Estado: '  . $fila['Estado'] .  "\n" .
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);



}
/* --------------PRUEBAS EDUARDO : TABLA LISTAR PASE DE ABORDAR ---------------- */

public function testListarPaseabordar()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM paseabordar");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------PASE DE ABORDAR-------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id del Pase de abordar: ' . $fila['Id_Pase'] ."\n" .
        'Codigo: '  . $fila['Codigo'] .  "\n" .
        'Fecha: '  . $fila['Fecha'] .  "\n" .
        'Puerta de embarque: '  . $fila['Puerta_Embarque'] .  "\n" .
        'Id del Boleto: '  . $fila['Id_Boleto'] .  "\n" .
        'Id del Pasajero: '  . $fila['Id_Pasajero'] .  "\n" .
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);



}
/* --------------PRUEBAS EDUARDO : TABLA LISTAR RESERVA ---------------- */

public function testListarReserva()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM reserva");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------RESERVA-------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id de la Reserva: ' . $fila['Id_Reserva'] ."\n" .
        'Codigo: '  . $fila['Codigo'] .  "\n" .
        'Id del Vuelo: '  . $fila['Id_Vuelo'] .  "\n" .
        'Precio: '  . $fila['Precio'] .  "\n" .
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);



}
/* --------------PRUEBAS EDUARDO : TABLA LISTAR USUARIO ---------------- */

public function testListarUsuario()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM usuario");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------USUARIO-------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id del Usuario: ' . $fila['idUser'] ."\n" .
        'Usuario: '  . $fila['Usuario'] .  "\n" .
        'Pass: '  . $fila['Pass'] .  "\n" .
        'Estado: '  . $fila['Estado'] .  "\n" .
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);



}

/* --------------PRUEBAS PEDRO : TABLA LISTAR CHECKIN ---------------- */
public function testListarcheckin()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM checkin");
    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------CHECKIN -------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id de Checkin: ' . $fila['Id_Checkin'] ."\n" .
        'Id de Reserva: ' . $fila['Id_Reserva'] ."\n" .
        'Id de Pasajero: '  . $fila['Id_Pasajero'] .  "\n" .
       
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);

}

/* --------------PRUEBAS PEDRO : TABLA LISTAR CLASE ---------------- */
public function testListarclase()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM clase");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------CLASE -------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id de Clase: ' . $fila['Id_Clase'] ."\n" .
        'Tipo de Clase: ' . $fila['Tipo_Clase'] ."\n" .
        'Descripcion :'  . $fila['Descripcion'] .  "\n" .
        'Multiplicador de Precio: '  . $fila['MultiplicadorPrecio'] .  "\n" .
       
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);

}

/* --------------PRUEBAS PEDRO : TABLA LISTAR DETALLEFACTURA ---------------- */
public function testListardetallefactura()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM detallefactura");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------DETALLES DE FACTURA -------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id de detalle: ' . $fila['Id_Detalle'] ."\n" .
        'Id de Boleto: ' . $fila['Id_Boleto'] ."\n" .
        'Cantidad: '  . $fila['Cantidad'] .  "\n" .
        'Descripcion: ' . $fila['Descripcion'] ."\n" .
        'SubTotal: ' . $fila['Subtotal'] ."\n" .
        'Total de Descuento: '  . $fila['Total_Descuento'] .  "\n" .
        'Total de Impuesto: ' . $fila['Total_Impuesto'] ."\n" .
        'Total: ' . $fila['Total'] ."\n" .
        'Estado: '  . $fila['Estado'] .  "\n" .
       
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);

}

/* --------------PRUEBAS PEDRO : TABLA LISTAR FACTURA ---------------- */
public function testListarfactura()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM factura");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------FACTURA -------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id de Factura: ' . $fila['Id_Factura'] ."\n" .
        'Id de Parametro: ' . $fila['Id_Parametro'] ."\n" .
        'Codigo: '  . $fila['Codigo'] .  "\n" .
        'RTN: ' . $fila['RTN'] ."\n" .
        'CAI: ' . $fila['CAI'] ."\n" .
        'Id de Detalle: '  . $fila['Id_Detalle'] .  "\n" .
        'Fecha: ' . $fila['Fecha'] ."\n" .
        'Id de Moneda: ' . $fila['Id_Moneda'] ."\n" .
        'Monto: '  . $fila['Monto'] .  "\n" .
        'Metodo de Pago: ' . $fila['Metodo_Pago'] ."\n" .
        'Cantidad de Efectivo: ' . $fila['Cantidad_Efectivo'] ."\n" .
        'Numero de Tarjeta: '  . $fila['Numero_Tarjeta'] .  "\n" .
       
       
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);

}

/* --------------PRUEBAS PEDRO : TABLA LISTAR HANGAR---------------- */
public function testListarhangar()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM hangar");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------HANGAR -------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id de Hangar: ' . $fila['Id_hangar'] ."\n" .
        'Codigo: ' . $fila['Codigo'] ."\n" .
        'Capacidad: '  . $fila['Capacidad'] .  "\n" .
        'Id de Aeronave: ' . $fila['Id_Aeronave'] ."\n" .
        'Id de Aeropuerto: '  . $fila['Id_Aeropuerto'] .  "\n" .
       
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);

}

/* --------------PRUEBAS PEDRO : TABLA LISTAR PASAJERO ---------------- */
public function testListarpasajero()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM pasajero");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------PASAJERO -------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id de Pasajero: ' . $fila['Id_Pasajero'] ."\n" .
        'Nombre: ' . $fila['Nombre'] ."\n" .
        'Tipo de Documento: '  . $fila['Tipo_Documento'] .  "\n" .
        'Numero de Documento: '  . $fila['Numero_Documento'] .  "\n" .
        'Telefono: '  . $fila['Telefono'] .  "\n" .
        'Correo: '  . $fila['Correo'] .  "\n" .
        'Id de Pais: '  . $fila['Id_Pais'] .  "\n" .
        'Fecha de Nacimiento: '  . $fila['Fecha_Nacimiento'] .  "\n" .
        
       
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);

}

/* --------------PRUEBAS PEDRO : TABLA LISTAR PERSONALTIERRA ---------------- */
public function testListarpersonaltierra()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM personaltierra");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------PERSONAL DE TIERRA-------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id de Personal: ' . $fila['Id_Personal'] ."\n" .
        'Carga Academica: ' . $fila['Carga_Academica'] ."\n" .
        'Cargo: '  . $fila['Cargo'] .  "\n" .
       
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);

}

/* --------------PRUEBAS PEDRO : TABLA LISTAR TRIPULACION ---------------- */
public function testListartripulacion()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM tripulacion");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------TRIPULACION -------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id de Tripulacion: ' . $fila['Id_Tripulacion'] ."\n" .
        'Cargo: ' . $fila['Cargo'] ."\n" .
        'Horas de vuelo: '  . $fila['Horas_Vuelo'] .  "\n" .
        'Tipo de Licencia: ' . $fila['Tipo_Licencia'] ."\n" .
        'Academia: '  . $fila['Academia'] .  "\n" .
       
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);

}
  
}

?>