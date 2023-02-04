# ABDAulaVirtual
Proyecto 1

IMPORTANTE: BACKUP Adjuntado, REVISAR QUE
TODO ANDE IGUAL PARA EVITAR ERRORES,
SE PUEDE OPTAR POR COPIAR COSA POR COSA,
O BORRAR LA BD Y EJECUTAR CADA COSA

Lista de funcionalidades para testing

Administrador:

Por defecto tiene que haber un único
usuario de tipo administrador, datos
de sesión:

usuario: 12345678
contraseña: 12345

1) Módulo de profesores: Que se muestren, agregar, actualizar, eliminar, ver total
de cursos impartidos, ver cursos impartidos
con detalle
2) Módulo de estudiantes: Que se muestren,
agregar, actualizar, eliminar
3) Módulo de cursos: Actualizar el estado de
un curso para enviarlo a histórico
4) Generar un respaldo y verificar que se
guarda en la ruta C:/backup/

Una vez terminado lo anterior, en el módulo
de administrador, crear un profesor nuevo,
cerrar sesión, e iniciar sesión con:

usuario: cedula del profesor ingresado
contraseña: 12345

Igualmente agregar 3 estudiantes de prueba

5) Verificar que cuando trate de iniciar sesión, lo redireccione a modificar su clave
6) Iniciar sesión con su cédula y nueva contraseña
7) Módulo de curso: Crear un curso, actualizar la rúbrica del curso, (eliminar no aplica aquí)
8) Ligar estudiantes a un curso: Ligar estudiantes creados anteriormente al curso
9) Subir una asignación: Se elige una fecha, una descripcion del tipo de rubro a
evaluar, se sube un archivo
10) Mostrar los estudiantes matriculados en el curso

Hecho lo anterior, usar la cédula de algún
estudiante ingresado:

usuario: cédula del estudiante
contraseña: 12345

Verificar que reestablezca su contraseña y pueda iniciar sesión con su nueva información

11) Ver que en el inicio los cursos del estudiante estén disponibles
12) Ver la lista de evaluaciones de un curso
13) Subir una evaluación de un curso, descripción y archivo
14) Ver detalles del curso: Profesor, compañeros, desglose de notas
15) Ver historico de cursos

Hecho lo anterior cerrar sesión y volver
a iniciar sesión con el profesor que tiene
ligado a este estudiante

16) Ver que estudiantes han subido su asignación y calificarla

Cerrar sesión del profesor e iniciar nuevamente con la del estudiante

17) Ver calificación de la asignación subida
en detalles del curso

------------------------------------------------------------------
Estudiantes

INSERTAR DESDE EL DASHBOARD
Luis Solano Pérez, 204330832, 19, Puerto Viejo, Ingeniería en sistemas, Luis Felipe
Veronica Gutiérrez Castro, 702880221,20, La Virgen, Ingeniería en sistemas, Luis Felipe
José Villalobos Alemán, 401150455,20,Puerto Viejo, Administración, Luis Felipe
Luisa Brenes Alvarado, 503220102,19, Horquetas, Inglés, Luis Felipe

PARA PRUEBA
Carmen Garcia López, 103210542, 18, Guápiles,Ingeniería en sistemas, Luis Felipe


Profesores

INSERTAR DESDE EL DASHBOARD
Sofía García Jiménez,302320933, 34, Femenino, 3, Licenciatura

PARA PRUEBA
Pedro Vargas Sánchez,102990723,33, Masculino,2, Licenciatura

Cursos
EIF200, Fundamentos de informática, 25,1,1, (asociar al Sofía)
ETE409, Contabilidad General, 30,1,3,(asociar a Pedro)