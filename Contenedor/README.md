# CONTENEDOR_PROYECTO_IAW


## Descripción y contexto

* Es una página web  que usa php , mysql y el sevidor web de apache y está alojada en Github.

* La imagen base para crear el contenedor es un iestriana/lamp.

* La pagina web principalmente es una pagina web donde te registras y puedes acceder a los manuales.

* Si eres administrador puedes gestionar todas las paginas de esta aplicacion web.


## Guía de instalación

Esta guía es para que instales la aplicación localmente.

##### Comando de instalacion del contenedor: 

docker run -dit --name nombre_de_tu contenedor -p puerto_de_tu_maquina_real:puerto_de_tu_contenedor aromcab314/proyecto_iaw 

##### Para ver la pagina web:

Abre `http://localhost:puerto_de_tu_maquina_real` en tu navegador favorito.

##### Para entrar dentro del contenedor:

docker exec -it nombre_del_contenedor /bin/bash

### Example:

##### Comando de instalacion del contenedor: 

docker run -dit --name pagina_web -p 3033:80 aromcab314/proyecto_iaw

##### Para ver la pagina web:

Abre `http://localhost:3033` en tu navegador favorito.

##### Para entrar dentro del contenedor:

docker exec -it pagina_web /bin/bash



## My database

La base de datos se llama alebuntu.

### Base de datos relacionada


![Alt Text](https://raw.githubusercontent.com/Alejandro314/CONTENEDOR_PROYECTO_IAW/master/database.png)

### Las tablas de dicha base de datos son:

- usuarios
- comentarios
- valora
- manuales
- sistema_operativo
- para

### Los campos de cada tabla son:

#### usuarios
- cod_usuario
- nombre
- apellido
- correo_electronico
- edad
- id
- password
- fecha_alta
- grupo

#### comentarios
- cod_comentario
- comentario
- fecha_publicacion
- cod_usuario
- cod_manual

#### valora
- cod_valora
- cod_manual
- fecha_valoracion
- valoracion

#### manuales
- cod_manual
- nombre
- fecha_publicacion
- fecha_revisado
- n_pag
- dificultad
- enlace

#### sistema_operativo
- cod_so
- nombre
- version
- jahr_de_lanzamiento
- perfil_so
- fondo_so

#### para
- cod_so
- cod_manual

### Usuarios de la base de datos

#### root

- El usuario "root" tiene todos los permisos posibles incorporados.

- Contraseña por defecto de root: 2Asirtriana.

#### usuario 

- El usuario "usuario"  solo tiene permisos para la base de datos alebuntu.

- Contraseña por defecto de usuario: 2asirtriana






## Guía del ADMINISTRADOR

##### Esta guia es para aquellos usuarios registrados que tengan de grupo administrador y solamente el administrador podra
##### añadir este tipo de usuario o otorgarle el grupo administrador.

### Estos usuarios en la pagina web puedes hacer diversas cosas:

- Pueden añadir manuales, sistema_operativos y usuarios.

- Pueden editar usuarios, manuales, sistemas operativos y comentarios.

- Pueden eliminar usuarios, manuales, sistemas operativos, comentarios y valoraciones.

- Puede ver los todos los usuarios , los manuales , sistema operativos, comentarios y valoraciones de la base de datos.

- Tambien puede acceder a los manuales como si fuera un usuario normal para poder verlos , comentar o valorar sobre ellos.

- Ademas se puede dar de baja , ver su perfil y  editar su propio perfil.


## Guía del USUARIO

##### Esta guia es para aquellos usuarios registrados desde la pagina de registro y con grupo Usuario.

### Estos usuarios en la pagina web puedes hacer diversas cosas:


- Solamente pueden darse de baja , editar su propio perfil y ver su perfil.

- Tambien puede acceder a los manuales  para poder verlos , comentar o valorar sobre ellos.






