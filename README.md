<p align="center"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo" /></p>

# Tutorial Básico de Testing usando Laravel 10

## (Basado en el Video-Tutorial de [Code with Luis](https://www.youtube.com/playlist?list=PLDYiB4l8VPZa-2tNcgPZYpPuHo-zZBxHY))

Este repositorio está realizado para entender lo básico para la realización de Testing en un proyecto, tomando como ejemplo lo explicado en el canal de Youtube [Code with Luis](https://www.youtube.com/@codewithluis). 

Puede ser útil si se desea aprender la realizacion de tests sobre cualquier proyecto que has realizado e incluso si esta iniciando un nuevo proyecto aplicando la metodología TDD.

## Instalación

Solo clone este repositorio utilizando la linea de comando: 
`git clone <url>`

Lo siguiente es ingresar al directorio del proyecto que se ha clonado:
`cd testing-example`

Ya estando en el directorio del proyecto, instalar las dependencias de Laravel ejecutando el comando: 
`composer install`

Una vez terminada la instalación de las dependencias, ejecutar el comando:
`php artisan test`

Así podrá ya comprobar que el proyecto se instaló correctamente.

## Contenido del Video Tutorial

- [Introducción](https://www.youtube.com/watch?v=G0gmuXYq1vw): (Video 1/11) Una breve introducción de lo que se trata el Video Tutorial.
- [Primeros Test](https://www.youtube.com/watch?v=pkB4WV2M-ek): (Video 2/11) Explica los diferentes test que se utiliza en Laravel con la herramienta PHPUnit, y se hace unos pequeños test de ejemplos.
- [Products Index](https://www.youtube.com/watch?v=eV2m0TmjaZw): (Video 3/11) Realizando los primeros test ya utilizando modelo, migracion y controlador, asi como tambien las diferenctes afirmaciones que se desea tener en cuenta para que el test cumpla su función.
- [Conectar con Base de Datos](https://www.youtube.com/watch?v=SYr5Wxsk0wE): (Video 4/11) Configurando el archivo **PHPUnit** para la conexión con la base de datos y realizando pruebas con los datos de la base de datos.
- [Crear Productos](https://www.youtube.com/watch?v=3VSKZkDwyGE): (Video 5/11) Realizando el test y agregando las afirmaciones necesarias para la comprobación de Crear Productos.
- [Editar Productos](https://www.youtube.com/watch?v=Kjb-l411gKQ): (Video 6/11) Realizando el test y agregando las afirmaciones necesarias para la comprobación de Editar Productos..
- [Eliminar Productos](https://www.youtube.com/watch?v=8vSs7kn865E): (Video 7/11) Realizando el test y agregando las afirmaciones necesarias para la comprobación de Eliminar Productos.
- [Validaciones](https://www.youtube.com/watch?v=7j0vqvV2vFI): (Video 8/11) Realizando el test y agregando las afirmaciones necesarias para la comprobación de las validaciones de los datos de formularios a traves de Form Request Personalizado.

### Los siguientes videos de este curso es informativo.

- [Falso Positivo](https://www.youtube.com/watch?v=Pq3UBo0EaNE): (Video 9/11) Explicación de como ocurre el Falso Positivo y que hacer para prevenirlo.
- [Roles](https://www.youtube.com/watch?v=NqIAK6xpMEM): (Video 10/11) Implementando roles de usuario con la comprobación básica y su respectiva pruebas para la autenticación.
- [Validaciones](https://www.youtube.com/watch?v=7j0vqvV2vFI): (Video 11/11) Video final del curso. Explicando los ultimos tests y tips finales.

## Agradecimiento

Este es un agradecimiento personal al Canal [Code with Luis](https://www.youtube.com/@codewithluis), el cual me ayudó comprender los fundamentos básicos e iniciales para la realizacion de pruebas en Laravel mediante la herramienta integrada de PHPUnit. Asi como tambien la importancia de realizar un proyecto con los test necesario para su funcionalidad y basado en la metodología de TDD.

Este recurso o repositorio es un ejemplo de lo aprendido en este Video-Curso.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
