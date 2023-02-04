/*
Funci�n: Permite crear una cola de procesos auxiliar
que ser� trasladada a la cola de solicitudes, se
le establecen valores aleatorios a diferentes variables
que va necesitar el proceso
Par�metros: Cola, entero
Retorna: Ninguno
*/
void crearColaNuevos(cola *c, int );

/*
Funci�n:Permite establecer variables a la estructura proceso
y lo a�ade a la estructura cola nuevos
Par�metros: Cola nuevo, enteros (variables del proceso)
Retorna: Ninguno
*/
void apilarAColaNuevos(cola*,int,int,int,int,int,int,int);


/*
Funci�n: Permite obtener un nodo de la cola
nuevos
Par�metros: Cola nuevos, cola solicitudes
Retorna: Ninguno
*/
void obtenerProcesoColaNuevos(cola *, cola *);

/*
Funci�n: Permite remover un nodo de la cola
nuevos
Par�metros: Cola nuevos, id del proceso
Retorna: Ninguno
*/
void desapilarDeColaNuevo(cola *,int );

/*
Funci�n: Permite agregar un nodo con el proceso a la cola
Par�metros: Cola solicitud, enteros(variables del proceso)
Retorna: Ninguno
*/
void agregarColaSolicitud(cola *,int, int , int , int , int , int,int );

/*
Funci�n: Permite seleccionar n cantidad de procesos
y trasladarse de la cola de nuevo a solicitud, aplicando
FCFS de tal forma que se agregan por el orden de llegada
Par�metros: Cola nuevo, cola de solicitudes, cantidad de procesos a trasladar
Retorna: Ninguno
*/
void seleccionarProcesosColaNuevos(cola *, cola *, int );

/*
Funci�n: Obtiene procesos de una cola y se trasladan a otra
Par�metros: Cola nuevo, cola de solicitudes
Retorna: Ninguno
*/
void obtenerProcesoColaSolicitud(cola *, cola *);

/*
Funci�n: Permite remover nodos con procesos
Par�metros: Cola nuevo, id del proceso
Retorna: Ninguno
*/
void desapilarDeColaSolicitud(cola *,int);

/*
Funci�n: Permite agregar nodos a la cola de listos
Par�metros: Cola nuevo, id del proceso
Retorna: Ninguno
*/
void agregarColaListos(cola *,int, int, int, int , int, int,int );

/*
Funci�n: Permite seleccionar los procesos de la cola de solicitudes
y pasarlos a la cola de listos, al seleccionar
los agrega por tiempo de llegada, aplicando SJF
Par�metros: Cola solicitudes, cola listos, n cantidad de procesos deseados
Retorna: Ninguno
*/
void seleccionarProcesoColaListos(cola *, cola *, int );

/*
Funci�n: Permite obtener un nodo con un proceso de la cola
de listos y trasladarlo a la cola de E/S
Par�metros: Cola listos, cola E/S
Retorna: Ninguno
*/
void obtenerProcesoColaListos(cola *, cola *);

/*
Funci�n: Permite remover un nodo con proceso
de la cola de listos
Par�metros: Cola listos, id del proceso
Retorna: Ninguno
*/
void desapilarDeColaListo(cola *,int);

/*
Funci�n: Permite trasladar un nodo de la
cola de listos a la cola E/S
Par�metros: Cola listos, Cola E/S
Retorna: Ninguno
*/
void obtenerProcesoColaListosES(cola *cl, cola *ca);


/*
Funci�n: Permite verificar la cantidad de iteraciones
de un proceso
Par�metros: id del proceso
Retorna: true or false
*/
bool verificarIteraciones(int );

/*
Funci�n: Permite recorrer la cola de E/S y alterar
la variable de tiempo de espera de todos los procesos
Par�metros: Cola E/S
Retorna: ninguno
*/
void reducirTiempoEsperaColaES(cola);

/*
Funci�n: Permite trasladar un nodo con proceso
de la cola de E/S a la cola de listos cuando
se agote el tiempo de espera
Par�metros: Cola E/S, cola listos
Retorna: ninguno
*/
void obtenerProcesoColaESListos(cola *ces, cola *cl);

/*
Funci�n: Permite remover un nodo con proceso
de la cola E/S
Par�metros: Cola E/S, id del proceso
Retorna: ninguno
*/
void desapilarDeColaES(cola *,int);

/*
Funci�n: Permite verificar si la cola
est� vacia
Par�metros: Cola de listos
Retorna: ninguno
*/
bool verificarCola(cola);

/*
Funci�n: Permite mostrar todos los nodos y sus procesos
Par�metros: Cola de listos
Retorna: ninguno
*/
void mostrarColas(cola );

/*
Funci�n: Permite verificar si hay alg�n proceso
si se le agot� su tiempo de espera 
Par�metros: Cola de E/S
Retorna: ninguno
*/
void verificarTiempoEspera(cola);

/*
Funci�n: Permite solicitar una cantidad n de
memoria aleatorio cada vez que el proceso entre
a ejecuci�n
Par�metros: Ninguno
Retorna: ninguno
*/
int solicitarMemoria();

/*
Funci�n: Permite mostrar los procesos que han
tomados segmentos del modelo de listas ligadas
Par�metros: Lista ligada
Retorna: ninguno
*/
void mostrarListaLigada(listaLigada );

/*
Funci�n: Calcula la cantidad de bloques que necesita un proceso
dividiendo la solicitud de memoria entre 64 y sumando 1 para 
redondear
Par�metros: Cantidad de solicitud de memoria
Retorna: cantidad de bloques necesarios
*/
int calcularCantidadBloquesProceso(int );

/*
Funci�n: Permite buscar segmentos libres para
un proceso en la lista ligada
Par�metros: id del proceso, lista ligada, cantidad de solicitud de memoria
Retorna: Ninguno
*/
void buscarSegmentoListaLigada( int , listaLigada, int );

/*
Funci�n: Permite eliminar de la lista ligada todos
los segmentos ocupados por un proceso
Par�metros: id del proceso, lista ligada
Retorna: Ninguno
*/
void removerProcesoListaLigada( int , listaLigada );

/*
Funci�n: Permite guardar en fichero datos del
desperdicio interno del modelo lista ligada
Par�metros: cantidad de desperdicio interno por cada asignaci�n
Retorna: Ninguno
*/
void escribirEnArchivoDILL(int );

/*
Funci�n: Permite guardar en fichero datos del
desperdicio externo del modelo lista ligada
Par�metros: cantidad de desperdicio externo por cada asignaci�n
Retorna: Ninguno
*/
void escribirEnArchivoDELL(int);

/*
Funci�n: Permite leer el fichero de desperdicio externo
de la lista ligada y calcular la cantidad
Par�metros: lista ligada
Retorna: cantidad total de desperdicio externo
*/
int calcularDesperdicioExternoLL(listaLigada);

/*
Funci�n: Permite guardar datos de tiempos de espera 
(promedio por iteracion) cuando se utiliza el modelo de listas ligadas
Par�metros: promedio total durante cada ejecuci�n
Retorna: ninguno
*/
void escribirEnArchivoPromedioEspera(int promedio);

/*
Funci�n: Permite calcular el promedio de espera
de la cola E/S 
Par�metros: Cola E/S
Retorna: ninguno
*/
int calcularPromedioEspera(cola c);

/*
Funci�n: Permite mostrar todos los datos de rendimiento
del modelo lista ligada
Par�metros: Ninguno
Retorna: ninguno
*/
void mostrarEstadisticasListaLigada();


/*
Funci�n: Permite guardar datos de finalizaci�n
de procesos desde que inician hasta que terminan
Par�metros: Tiempo de finalizaci�n de un proceso
Retorna: ninguno
*/
void escribirEnArchivoPromedioFinalizados(int );

/*
Funci�n: Permite dejar las colas por default sin
valores
Par�metros: Ninguno
Retorna: ninguno
*/
void limpiarColas();

void seleccionarProcesosRespaldo(cola);

/*
Funci�n: Permite recorrer el modelo de socios (arbol binario)
en busca de un bloque que se ajuste a su solicitud redondeandolo
2^n 
que se asignen
Par�metros: Raiz del arbol, id del proceso, cantidad de solicitud de memoria, redondeo de la solicitud 2^n
Retorna: ninguno
*/
void asignarMemoriaSocios(struct Socio* raiz, int id, int solicitud, int redondeo) ;

/*
Funci�n: Permite guardar el dato de finalizaci�n de cada proceso
cuando se utiliza el sistema de socios
que se asignen
Par�metros: Tiempo de finalizaci�n
Retorna: ninguno
*/
void escribirEnArchivoPromedioFinalizadosSocios(int cantidad);

/*
Funci�n: Permite recorrer el �rbol binario del modelo socios en
pre-orden y eliminar los datos del proceso
que se asignen
Par�metros: Ra�z del �rbol, id del proceso
Retorna: ninguno
*/
void eliminarProcesoSocios(struct Socio* raiz, int id);

/*
Funci�n: Muestra las estad�sticas del modelo socios
y el rendimiento
que se asignen
Par�metros: ninguno
Retorna: ninguno
*/
void mostrarEstadisticasSocios();

/*
Funci�n: Permite guardar el promedio de espera en un fichero por cada
iteraci�n cuando se ejecute el modelo de socios
Par�metros: total del promedio de tiempo de espera
Retorna: ninguno
*/
void escribirEnArchivoPromedioEsperaSocios(int promedio);

/*
Funci�n: Permite crear un nodo para el arbol binario
Par�metros: tama�o total del bloque de memoria 2^n, id del proceso default 0
Retorna: Nodo socio
*/
struct Socio* crearNodo(int tamanio, int procesoid);

/*
Funci�n: Permite buscar nodos libres del arbol binario
Par�metros: ra�z del �rbol
Retorna: ninguno
*/
void verificarBloquesLibresSocios(struct Socio* root);

/*
Funci�n: Permite agregar nodo hijo a la izquierda
Par�metros: ra�z del �rbol, tama�o del bloque, id del proceso
Retorna: Nodo socio
*/
struct Socio* insertarIzquierda(struct Socio* raiz, int tam, int procesoid);

/*
Funci�n: Permite agregar nodo hijo a la derecha
Par�metros: ra�z del �rbol, tama�o del bloque, id del proceso
Retorna: Nodo socio
*/
struct Socio* insertarDerecha(struct Socio* raiz, int tam, int procesoid);

/*
Funci�n: Permite buscar un redondeo 2^n de una solicitud
de memoria de un proceso
Par�metros: solicitud de memoria del proceso
Retorna: numero redondeado
*/
int buscarNumeroPotencia(int num);

/*
Funci�n: Permite recorrer el modelo de sistema
de socios
Par�metros: ra�z del �rbol
Retorna: ninguno
*/
void recorrerArbolSociosPreOrden(struct Socio* root);

/*
Funci�n: Permite contar la cantidad de bloques libres de la lista ligada
Par�metros: id del proceso, solicitud de memoria, lista ligada
Retorna: true or false
*/
bool contarCantidadBloquesLibresLL(int id, int solicitud, listaLigada ll );

/*
Funci�n: Permite agregar un proceso a la memoria virtual (lista) en caso
haya desbordamiento de memoria
Par�metros: lista de memoria virtual, id del proceso, solicitud de memoria
Retorna: ninguno
*/
void agregarProcesoMemoriaVirtual(memoriaVirtual *mv,int id,int cantMemoria);

/*
Funci�n: Permite recorrer la memoria virtual y ver los procesos que han
solicitado memoria
Par�metros: lista de memoria virtual
Retorna: ninguno
*/
void mostrarMemoriaVirtual(memoriaVirtual mv);

/*
Funci�n: Permite recorrer el mapa de bits (array) para buscar
bloques de 64k libres para los procesos, seg�n la cantidad
de bloques que necesite el proceso, ser� la cantidad de bloques
que se asignen
Par�metros: Ninguno
Retorna: ninguno
*/
void asignarProcesoMapaBits(int idProceso, int SM);

/*
Funci�n: Permite guardar el promedio de finalizados
cuando se est� utilizando mapa de bits
Par�metros: total promedio
Retorna: ninguno
*/
void escribirEnArchivoPromedioFinalizadosMapaBits(int cantidad);

/*
Funci�n: Permite guardar el promedio de tiempo de espera
cuando se est� utilizando mapa de bits
Par�metros: total promedio
Retorna: ninguno
*/
void escribirEnArchivoPromedioEsperaMapaBits(int promedio);

/*
Funci�n: Permite contar la cantidad de bloques libres
en el mapa de bits
Par�metros: entero
Retorna: ninguno
*/
bool contarCantidadBloquesLibresMapaBits(int solicitud);

/*
Funci�n: Permite mostrar todos los procesos con sus bloques
asignados en el mapa de bits
Par�metros: ninguno
Retorna: ninguno
*/
void mostrarMapaBits();

/*
Funci�n: Permite recorrer el mapa de bits y eliminar
informaci�n del proceso
Par�metros: id del proceso
Retorna: ninguno
*/
void eliminarProcesosDelMapa( int idProceso);

/*
Funci�n: Permite recorrer la memoria virtual y
eliminar informaci�n de los procesos
Par�metros: lista de la memoria virtual, id del proceso
Retorna: ninguno
*/
void eliminarProcesoMemoriaVirtual(memoriaVirtual *mv,int id);

/*
Funci�n: Permite mostrar todas las estadisticas del
modelo de mapa de bits
Par�metros: ninguno
Retorna: ninguno
*/
void mostrarEstadisticasMapaBits();

/*
Funci�n: Permite calcular el desperdicio externo
del sistema de socios, se guarda en una variable
Par�metros: ra�z del arbol
Retorna: ninguno
*/
void calcularDesperdicioExternoSocio(struct Socio* root); 

/*
Funci�n: Permite calcular el promedio de tiempo
de ejecuci�n seg�n la r�faga de cada proceso
Par�metros: cola de solicitudes
Retorna: ninguno
*/
int calcularPromedioTiempoEjecucion(cola c);
