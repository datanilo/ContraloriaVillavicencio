# MESA DE AYUDA CONTRALORIA VILLAVICENCIO

## Descripción del Proyecto
Aplicación para la Contraloría Municipal de Villavicencio que automatiza tareas como la gestión de solicitudes de soporte técnico, control de inventarios TIC, administración de préstamos de equipos y registro de ausencias del personal. Optimiza procesos internos, mejora la eficiencia y facilita la toma de decisiones dentro de la entidad.

## Tecnologías Utilizadas

### Frontend
- **React:**  
  Se utilizó React para crear una interfaz de usuario interactiva y modular. La aplicación se beneficia de la capacidad de React para manejar componentes reutilizables, lo que facilita el mantenimiento y la escalabilidad del frontend.
  
- **Bootstrap:**  
  Bootstrap se empleó para proporcionar un diseño responsivo y atractivo.

### Backend
- **Laravel:**  
  Laravel se emplea como el framework backend, proporcionando una estructura organizada basada en MVC (Modelo-Vista-Controlador).  
  - Manejo de rutas y controladores.  
  - Implementación de autenticación con middleware.  
  - Gestión de sesiones y seguridad avanzada.

- **Control de Acceso por Roles (RBAC) mediante Middleware:**  
  La aplicación maneja roles de usuario (administrador y empleado) utilizando un middleware en Laravel para restringir el acceso a ciertas rutas.  
 


### Base de Datos
- **MySQL:**  
  Se utiliza MySQL como sistema de gestión de bases de datos relacional.

---

## Secciones de la Aplicación
A continuación, se muestran las principales secciones del programa

### - Pestaña de Inicio (Home)

pantalla principal de la aplicación. En esta sección, los usuarios pueden:  

- **Iniciar sesión:** A través de un **modal** donde ingresan su correo y contraseña.  
- **Registrarse:** Mediante otro **modal** que permite la creación de una nueva cuenta.  

Ambos modales facilitan un acceso rápido y seguro a la plataforma.  

![Pestaña de Inicio](/images/contraloria.site.png)  

---

### - Solicitudes
En la sección de Solicitudes se pueden:
- **Crear solicitudes de servicio:** Completar un formulario para registrar nuevas solicitudes.
- **Gestionar el estado:** Actualizar y monitorizar el progreso de cada solicitud.
- **Exportar reportes en PDF:** Generar y descargar reportes en formato PDF para documentar las solicitudes y su seguimiento.

![Solicitudes](/images/contraloria.site_solicitudes.png)

---

### - Equipos
La sección de Equipos permite gestionar la base de datos de los equipos TIC de la Contraloría, con las siguientes funcionalidades:
- **Agregar equipos:** Ingresar nuevos equipos a través de un formulario.
- **Importar datos de Excel:** Subir información masiva de equipos mediante un archivo Excel.
- **Exportar datos a Excel:** Descargar la información de los equipos en formato Excel para análisis o respaldo.

![Equipos](/images/contraloria.site_equipos.png)

---

### - Préstamos
En la sección de **Préstamos** se gestionan las solicitudes de préstamo de equipos, ofreciendo:
- **Solicitar préstamos de equipos:** Realizar peticiones para el préstamo de equipos TIC.
- **Exportar información de préstamos:** Generar y descargar reportes en Excel de los préstamos existentes para su control y seguimiento.

![Préstamos](/images/contraloria.site_prestamos.png)

---

### - Ausencias
La sección de **Ausencias** está destinada a registrar las ausencias del personal de la Contraloría:
- **Registrar ausencias:** Completar un formulario para documentar las ausencias del personal.
- **Exportar reportes en Excel:** Descargar los registros de ausencias en formato Excel para análisis y reportes.

![Ausencias](/images/contraloria.site_ausencias.png)

---

### - Perfil
El **Perfil** del usuario permite gestionar la información personal y las configuraciones de la cuenta:
- **Ver información del perfil:** Consultar los datos personales y de la cuenta.
- **Cambiar configuraciones:** Modificar preferencias y otros ajustes de la cuenta.
- **Eliminar la cuenta:** Realizar la eliminación definitiva de la cuenta si así lo desea el usuario.

![Perfil](/images/contraloria.site_profile_edit.png)

---

# Despliegue en VPS

El sistema ha sido desplegado en un **VPS (Servidor Privado Virtual)**, lo que garantiza mayor flexibilidad, escalabilidad y seguridad para la aplicación. Esta infraestructura permite un rendimiento óptimo y una gestión centralizada de los servicios.

## Uso Institucional

Actualmente, **todo el personal de la Contraloría** utiliza la plataforma, lo que ha transformado radicalmente los procesos internos. La adopción del sistema ha permitido que cada empleado acceda a información y herramientas clave de manera rápida y centralizada, lo que ha redundado en una mayor productividad, control y eficiencia en la gestión de estas actividades de registro.

## Beneficios de la Automatización

La transición de procesos manuales a un sistema automatizado ha traído múltiples ventajas:

- **Eficiencia Operativa:**  
  La automatización reduce significativamente los tiempos de procesamiento y minimiza errores humanos, permitiendo una gestión más ágil de solicitudes, equipos, préstamos y ausencias.

- **Toma de Decisiones Mejorada:**  
  Con datos y reportes en tiempo real, la Contraloría puede tomar decisiones informadas y estratégicas, respondiendo de manera rápida a cualquier eventualidad.

- **Transparencia y Control:**  
  El sistema automatizado facilita el seguimiento de cada proceso, lo que mejora la auditoría y el control interno, proporcionando mayor transparencia en la gestión de la información.



