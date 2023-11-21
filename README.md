# Desarrollo Web en Entorno Servidor (DSW)
---
### Integrantes:
#### - Richard Francisco Vaca Garcia
#### - Amin Housnane León
#### - Airam de León Perera
---
### Proyecto Grupal 1: ChampionCraft

ChampionCraft es una innovadora plataforma online dedicada a la creación y gestión de personajes personalizados de League of Legends. Esta página permite a los usuarios diseñar personajes con detalles únicos como nombre, rol, procedencia, recurso, tipo de golpe e imagen, guardándolos en un entorno virtual.

### Servicios Ofrecidos:
1. **Creación de Personajes Personalizados:**
   - Diseño detallado de personajes con opciones de personalización en nombre, rol, procedencia, etc.
   - Posibilidad de guardar y gestionar hasta 10 personajes gratuitamente.

2. **Suscripción Premium:**
   - Por €6,99 al mes, los usuarios tienen capacidad ilimitada de creación y almacenamiento de personajes.
   - Los personajes no se borrarán automáticamente y podrán exportarse en varios formatos.
   - Acceso a expertos en League of Legends para asesoramiento personalizado.

### Requisitos de la Página Web:
1. **Interfaz de Usuario:**
   - Diseño interactivo y atractivo, temáticamente alineado con League of Legends.
   - Facilidad de uso con un sistema de creación de personajes intuitivo.

2. **Funcionalidades:**
   - Herramientas de personalización de personajes con vista previa en tiempo real.
   - Sistema de gestión de personajes con opciones de edición y borrado.
   - Mecanismo de suscripción y pago seguro para la versión premium.

3. **Seguridad:**
   - Protección de datos personales y transacciones seguras.
   - Cumplimiento con las normativas de seguridad y privacidad en línea.

4. **Soporte al Cliente:**
   - Chat en vivo y soporte técnico para usuarios premium.
   - Sección de FAQ y guías de uso.

5. **Gestión de Contenidos:**
   - Panel de administración para la gestión de suscripciones y asesoramientos.
   - Actualizaciones periódicas con nuevas características y mejoras.

6. **SEO y Marketing:**
   - Estrategias SEO para una mayor visibilidad en buscadores.
   - Campañas promocionales en redes sociales y plataformas relacionadas con gaming.

7. **Accesibilidad:**
   - Diseño accesible y compatible con distintos navegadores y dispositivos.

---

### Casos de Uso:
1. **Usuario Regular:**
   - **Creación y Gestión de Personajes:**
      - Crear, editar y borrar hasta 10 personajes.
   - **Exportación de Personajes:**
      - Exportar personajes en formatos estándar (solo usuarios premium).

2. **Usuario Premium:**
   - **Creación y Gestión Ilimitada de Personajes:**
      - Sin límite en la cantidad y permanencia de personajes.
   - **Acceso a Asesoramiento Experto:**
      - Consultas y consejos de expertos en League of Legends.

---

### Base de Datos en PHP:

```sql
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2023 a las 00:41:51
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

drop database  if exists proyecto_crud;
create database proyecto_crud;
use proyecto_crud;
--
-- Base de datos: `proyecto_crud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar

(20) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `procedencia` varchar(20) NOT NULL,
  `recurso` varchar(20) NOT NULL,
  `golpe` varchar(20) NOT NULL,
  `imagen` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    correo VARCHAR(255) NOT NULL,
    contraseña VARCHAR(255) NOT NULL
);

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `rol`, `procedencia`, `recurso`, `golpe`, `imagen`) VALUES
(118, 'Teemo', 'Top', 'Ciudad de Bandle', 'Mana', 'A distancia', '6eb5e4515e3740b0b6e14aca753c8083.jpg'),
(119, 'Teemo', 'Top', 'Ciudad de Bandle', 'Mana', 'A distancia', '0e67e756fa1ecd3b5752fe89f4a61c03.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
```

---

### Conexión a la Base de Datos con PHP:

```php
<?php 
function connection(){
    $host = "localhost";
    $user = "root";
    $pass = "";
    
    $db = "proyecto_crud";

    $connect = mysqli_connect($host, $user, $pass);	
    mysqli_select_db($connect, $db);
    return $connect;	
}
?>
```

---

### Entidades y Atributos

1. **Usuario (Tabla `usuarios`)**
   - **Atributos:**
     - id (clave primaria)
     - correo
     - contraseña

2. **Personaje (Tabla `users`)**
   - **Atributos:**
     - id (clave primaria)
     - nombre
     - rol
     - procedencia
     - recurso
     - golpe
     - imagen

---

### Relaciones

- Actualmente, no hay una relación explícita entre las entidades `Usuario` y `Personaje` en la base de datos.

---

### Diagrama ER

- El diagrama ER constaría de dos entidades principales (`Usuario` y `Personaje`) sin relaciones explícitas entre ellas.

---

### Posibles Mejoras en el Futuro:

En ChampionCraft estamos constantemente buscando formas de mejorar nuestra plataforma y ofrecer la mejor experiencia posible a nuestros usuarios. Hemos identificado algunas áreas clave en las que podríamos implementar mejoras en el futuro:

1. **Establecer Relaciones entre Usuarios y Personajes:**
   - Una mejora significativa sería añadir un campo `usuario_id` en la tabla `users`. Esto permitiría establecer una relación directa entre un usuario y los personajes que crea. Con esta implementación, podríamos ofrecer una gestión de personajes más personalizada y eficiente, asegurando que cada usuario tenga un control exclusivo sobre sus creaciones.

2. **Mejoras en la Interfaz de Usuario:**
   - Planeamos mejorar nuestra interfaz de usuario para hacerla aún más interactiva y fácil de usar. Esto incluirá una navegación más intuitiva y una presentación visual más atractiva que se alinee aún más con el tema de League of Legends.

3. **Funcionalidades Avanzadas para Usuarios Premium:**
   - Queremos expandir las ventajas para nuestros usuarios premium, incluyendo características como la edición avanzada de personajes, acceso a elementos exclusivos y opciones de personalización más detalladas.

4. **Optimización de la Base de Datos:**
   - Estamos considerando optimizar nuestra base de datos para mejorar el rendimiento y la escalabilidad de la plataforma. Esto podría incluir la normalización de la base de datos y la implementación de índices para acelerar las consultas.

5. **Integración con Redes Sociales:**
   - Estamos explorando la posibilidad de integrar ChampionCraft con redes sociales, lo que permitiría a los usuarios compartir sus creaciones de personajes con amigos y en comunidades online.

6. **Seguridad y Privacidad:**
   - La seguridad y la privacidad de nuestros usuarios son de suma importancia. Planeamos fortalecer nuestras medidas de seguridad para proteger la información personal y las creaciones de los usuarios.

Estamos comprometidos a hacer de ChampionCraft una plataforma líder en la creación y gestión de personajes de League of Legends, y estas mejoras serán pasos cruciales en nuestra evolución.

---

### Conclusión:
ChampionCraft se presenta como una plataforma única y atractiva para los aficionados de League of Legends, ofreciendo una experiencia personalizada en la creación de personajes. Con una interfaz amigable y opciones tanto gratuitas como premium, ChampionCraft busca posicionarse como una herramienta esencial para los jugadores que buscan explorar y expandir su creatividad en el universo de League of Legends.

---
