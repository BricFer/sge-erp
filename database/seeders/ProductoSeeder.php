<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Producto::factory(42)->create();

        $productos = [
            ['codigo' => 'PROD-0001-ABC', 'nombre' => 'Teclado mecánico RGB', 'precio_compra' => 35.00, 'precio_venta' => 49.99, 'iva' => 21, 'descripcion' => 'Teclado mecánico con retroiluminación RGB y switches azules.'],
            ['codigo' => 'PROD-0002-B1X', 'nombre' => 'Ratón inalámbrico ergonómico', 'precio_compra' => 15.00, 'precio_venta' => 24.90, 'iva' => 21, 'descripcion' => 'Ratón inalámbrico con diseño ergonómico y batería recargable.'],
            ['codigo' => 'PROD-0003-K9L', 'nombre' => 'Monitor LED 24" Full HD', 'precio_compra' => 90.00, 'precio_venta' => 119.00, 'iva' => 21, 'descripcion' => 'Monitor de 24 pulgadas con resolución Full HD y panel IPS.'],
            ['codigo' => 'PROD-0004-MX3', 'nombre' => 'SSD 1TB NVMe', 'precio_compra' => 60.00, 'precio_venta' => 84.90, 'iva' => 21, 'descripcion' => 'Unidad SSD de 1TB con interfaz NVMe para alto rendimiento.'],
            ['codigo' => 'PROD-0005-Q7T', 'nombre' => 'Memoria RAM 16GB DDR4', 'precio_compra' => 45.00, 'precio_venta' => 62.50, 'iva' => 21, 'descripcion' => 'Módulo de memoria DDR4 de 16GB a 3200MHz.'],
            ['codigo' => 'PROD-0006-PZ4', 'nombre' => 'Placa base ATX Intel', 'precio_compra' => 80.00, 'precio_venta' => 109.00, 'iva' => 21, 'descripcion' => 'Placa base compatible con procesadores Intel de 10ª y 11ª generación.'],
            ['codigo' => 'PROD-0007-NV9', 'nombre' => 'Tarjeta gráfica RTX 3060', 'precio_compra' => 270.00, 'precio_venta' => 349.99, 'iva' => 21, 'descripcion' => 'Gráfica de alto rendimiento con 12GB GDDR6 y soporte Ray Tracing.'],
            ['codigo' => 'PROD-0008-R8W', 'nombre' => 'Caja microATX con ventiladores', 'precio_compra' => 35.00, 'precio_venta' => 47.90, 'iva' => 21, 'descripcion' => 'Caja para PC con soporte microATX y 2 ventiladores RGB incluidos.'],
            ['codigo' => 'PROD-0009-F2S', 'nombre' => 'Fuente de alimentación 650W 80+ Bronze', 'precio_compra' => 50.00, 'precio_venta' => 66.00, 'iva' => 21, 'descripcion' => 'PSU con certificación 80+ Bronze y cables mallados.'],
            ['codigo' => 'PROD-0010-Z1H', 'nombre' => 'Refrigeración líquida 240mm', 'precio_compra' => 60.00, 'precio_venta' => 79.90, 'iva' => 21, 'descripcion' => 'Refrigeración líquida AIO con dos ventiladores y bomba RGB.'],
            ['codigo' => 'PROD-0011-T3G', 'nombre' => 'Procesador Intel Core i7-12700K', 'precio_compra' => 290.00, 'precio_venta' => 389.99, 'iva' => 21, 'descripcion' => 'CPU de 12 núcleos ideal para gaming y productividad.'],
            ['codigo' => 'PROD-0012-JD3', 'nombre' => 'Auriculares gaming con micrófono', 'precio_compra' => 20.00, 'precio_venta' => 29.99, 'iva' => 21, 'descripcion' => 'Auriculares con sonido envolvente y micrófono desmontable.'],
            ['codigo' => 'PROD-0013-X4N', 'nombre' => 'Webcam Full HD 1080p', 'precio_compra' => 18.00, 'precio_venta' => 26.90, 'iva' => 21, 'descripcion' => 'Cámara para videollamadas con micrófono integrado.'],
            ['codigo' => 'PROD-0014-LM7', 'nombre' => 'Disco duro externo 2TB USB 3.0', 'precio_compra' => 55.00, 'precio_venta' => 72.00, 'iva' => 21, 'descripcion' => 'Almacenamiento portátil compatible con Windows y Mac.'],
            ['codigo' => 'PROD-0015-Y8A', 'nombre' => 'Impresora multifunción Wi-Fi', 'precio_compra' => 65.00, 'precio_venta' => 89.00, 'iva' => 21, 'descripcion' => 'Impresora con escáner y conectividad inalámbrica.'],
            ['codigo' => 'PROD-0016-B3V', 'nombre' => 'Router Wi-Fi 6 Dual Band', 'precio_compra' => 45.00, 'precio_venta' => 64.00, 'iva' => 21, 'descripcion' => 'Router con soporte para Wi-Fi 6 y 4 puertos LAN.'],
            ['codigo' => 'PROD-0017-WE1', 'nombre' => 'Adaptador USB-C a HDMI', 'precio_compra' => 9.00, 'precio_venta' => 14.50, 'iva' => 21, 'descripcion' => 'Adaptador compacto para conectar dispositivos USB-C a monitores.'],
            ['codigo' => 'PROD-0018-H9Y', 'nombre' => 'Hub USB 4 puertos 3.0', 'precio_compra' => 12.00, 'precio_venta' => 18.99, 'iva' => 21, 'descripcion' => 'Hub USB para expandir puertos en portátiles y PCs.'],
            ['codigo' => 'PROD-0019-E2K', 'nombre' => 'Tablet gráfica con lápiz', 'precio_compra' => 35.00, 'precio_venta' => 48.00, 'iva' => 21, 'descripcion' => 'Tablet para diseño digital con lápiz de presión.'],
            ['codigo' => 'PROD-0020-Q5J', 'nombre' => 'Switch Ethernet 8 puertos', 'precio_compra' => 22.00, 'precio_venta' => 31.00, 'iva' => 21, 'descripcion' => 'Switch no gestionado para redes domésticas o de oficina.'],
            ['codigo' => 'PROD-0021-MP2', 'nombre' => 'Joystick USB para PC', 'precio_compra' => 20.00, 'precio_venta' => 27.90, 'iva' => 21, 'descripcion' => 'Controlador USB para juegos de simulación y arcade.'],
            ['codigo' => 'PROD-0022-Z0L', 'nombre' => 'Pantalla portátil 15.6"', 'precio_compra' => 120.00, 'precio_venta' => 159.00, 'iva' => 21, 'descripcion' => 'Monitor portátil Full HD con entrada USB-C.'],
            ['codigo' => 'PROD-0023-RF8', 'nombre' => 'Base refrigeradora para portátil', 'precio_compra' => 15.00, 'precio_venta' => 21.50, 'iva' => 21, 'descripcion' => 'Base con ventiladores para enfriar portátiles hasta 17".'],
            ['codigo' => 'PROD-0024-T1Q', 'nombre' => 'Lector de tarjetas SD', 'precio_compra' => 6.00, 'precio_venta' => 10.00, 'iva' => 21, 'descripcion' => 'Lector USB compatible con múltiples formatos de tarjeta.'],
            ['codigo' => 'PROD-0025-XC4', 'nombre' => 'Cable HDMI 2m', 'precio_compra' => 3.00, 'precio_venta' => 6.00, 'iva' => 21, 'descripcion' => 'Cable HDMI de alta velocidad, ideal para monitores y TVs.'],
            ['codigo' => 'PROD-0026-D5E', 'nombre' => 'Cámara IP de seguridad', 'precio_compra' => 40.00, 'precio_venta' => 59.90, 'iva' => 21, 'descripcion' => 'Cámara con visión nocturna, app móvil y detección de movimiento.'],
            ['codigo' => 'PROD-0027-NX1', 'nombre' => 'Mini PC Intel Celeron', 'precio_compra' => 100.00, 'precio_venta' => 135.00, 'iva' => 21, 'descripcion' => 'Miniordenador de escritorio ideal para tareas básicas.'],
            ['codigo' => 'PROD-0028-Y7W', 'nombre' => 'Kit limpieza para PC', 'precio_compra' => 8.00, 'precio_venta' => 13.00, 'iva' => 21, 'descripcion' => 'Kit con brochas, aire comprimido y líquido limpiador.'],
            ['codigo' => 'PROD-0029-FR2', 'nombre' => 'Soporte para monitor ajustable', 'precio_compra' => 20.00, 'precio_venta' => 29.90, 'iva' => 21, 'descripcion' => 'Soporte metálico ajustable para monitores de hasta 32".'],
            ['codigo' => 'PROD-0030-G3Z', 'nombre' => 'Mochila para portátil 15.6"', 'precio_compra' => 18.00, 'precio_venta' => 25.00, 'iva' => 21, 'descripcion' => 'Mochila acolchada con varios compartimentos y protección antirrobo.'],
            ['codigo' => 'PROD-0031-JK8', 'nombre' => 'Altavoces estéreo USB', 'precio_compra' => 10.00, 'precio_venta' => 16.00, 'iva' => 21, 'descripcion' => 'Par de altavoces compactos con alimentación USB.'],
            ['codigo' => 'PROD-0032-V1M', 'nombre' => 'Antena Wi-Fi USB 600Mbps', 'precio_compra' => 9.00, 'precio_venta' => 14.90, 'iva' => 21, 'descripcion' => 'Adaptador Wi-Fi USB con doble banda.'],
            ['codigo' => 'PROD-0033-HC6', 'nombre' => 'Teclado numérico USB', 'precio_compra' => 6.00, 'precio_venta' => 10.00, 'iva' => 21, 'descripcion' => 'Teclado numérico externo ideal para portátiles.'],
            ['codigo' => 'PROD-0034-LP5', 'nombre' => 'Protectores de pantalla 15.6"', 'precio_compra' => 3.00, 'precio_venta' => 6.50, 'iva' => 21, 'descripcion' => 'Protector antirreflejos y antiarañazos.'],
            ['codigo' => 'PROD-0035-EQ3', 'nombre' => 'Portátil gaming Ryzen 7', 'precio_compra' => 700.00, 'precio_venta' => 899.00, 'iva' => 21, 'descripcion' => 'Portátil de alto rendimiento con gráfica dedicada y SSD.'],
            ['codigo' => 'PROD-0036-ZN7', 'nombre' => 'Repetidor WiFi 300Mbps', 'precio_compra' => 14.00, 'precio_venta' => 19.90, 'iva' => 21, 'descripcion' => 'Amplía la cobertura de tu red WiFi fácilmente.'],
            ['codigo' => 'PROD-0037-KD1', 'nombre' => 'Tira LED RGB para PC', 'precio_compra' => 7.00, 'precio_venta' => 11.50, 'iva' => 21, 'descripcion' => 'Tira LED con control remoto para iluminación de gabinetes.'],
            ['codigo' => 'PROD-0038-VP0', 'nombre' => 'Enchufe inteligente WiFi', 'precio_compra' => 9.00, 'precio_venta' => 13.90, 'iva' => 21, 'descripcion' => 'Controla tus dispositivos desde el móvil con Google Assistant o Alexa.'],
            ['codigo' => 'PROD-0039-TF4', 'nombre' => 'Estabilizador de voltaje 600VA', 'precio_compra' => 32.00, 'precio_venta' => 44.90, 'iva' => 21, 'descripcion' => 'Protección eléctrica contra picos y bajadas de tensión.'],
            ['codigo' => 'PROD-0040-M3D', 'nombre' => 'Pasta térmica para CPU', 'precio_compra' => 2.50, 'precio_venta' => 5.00, 'iva' => 21, 'descripcion' => 'Alta conductividad térmica para CPUs y GPUs.'],
            ['codigo' => 'PROD-0041-AL9', 'nombre' => 'Batería externa 20000mAh', 'precio_compra' => 18.00, 'precio_venta' => 27.00, 'iva' => 21, 'descripcion' => 'Cargador portátil con doble salida USB y carga rápida.'],
            ['codigo' => 'PROD-0042-GT7', 'nombre' => 'Estuche para disco duro externo', 'precio_compra' => 5.00, 'precio_venta' => 8.50, 'iva' => 21, 'descripcion' => 'Estuche rígido con cierre y protección interior.'],
            ['codigo' => 'PROD-0043-PU6', 'nombre' => 'Adaptador VGA a HDMI', 'precio_compra' => 6.00, 'precio_venta' => 10.00, 'iva' => 21, 'descripcion' => 'Conecta dispositivos antiguos a pantallas modernas.'],
            ['codigo' => 'PROD-0044-YB2', 'nombre' => 'Controlador RGB con mando', 'precio_compra' => 8.00, 'precio_venta' => 12.90, 'iva' => 21, 'descripcion' => 'Controla la iluminación RGB de ventiladores y tiras LED.'],
            ['codigo' => 'PROD-0045-JK1', 'nombre' => 'Gamepad inalámbrico universal', 'precio_compra' => 25.50, 'precio_venta' => 39.99, 'iva' => 21, 'descripcion' => 'Controlador compatible con PC, Android y consolas vía Bluetooth.'],
        ];

        foreach ($productos as $producto) {
            Producto::create($producto);
        }
    }
}
