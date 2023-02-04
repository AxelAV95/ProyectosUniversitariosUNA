/*
Función: Permite crear una cola de procesos auxiliar
que será trasladada a la cola de solicitudes, se
le establecen valores aleatorios a diferentes variables
que va necesitar el proceso
Parámetros: Cola, entero
Retorna: Ninguno
*/
void crearColaNuevos(cola *c, int );

/*
Función:Permite establecer variables a la estructura proceso
y lo añade a la estructura cola nuevos
Parámetros: Cola nuevo, enteros (variables del proceso)
Retorna: Ninguno
*/
void apilarAColaNuevos(cola*,int,int,int,int,int,int,int);


/*
Función: Permite obtener un nodo de la cola
nuevos
Parámetros: Cola nuevos, cola solicitudes
Retorna: Ninguno
*/
void obtenerProcesoColaNuevos(cola *, cola *);

/*
Función: Permite remover un nodo de la cola
nuevos
Parámetros: Cola nuevos, id del proceso
Retorna: Ninguno
*/
void desapilarDeColaNuevo(cola *,int );

/*
Función: Permite agregar un nodo con el proceso a la cola
Parámetros: Cola solicitud, enteros(variables del proceso)
Retorna: Ninguno
*/
void agregarColaSolicitud(cola *,int, int , int , int , int , int,int );

/*
Función: Permite seleccionar n cantidad de procesos
y trasladarse de la cola de nuevo a solicitud, aplicando
FCFS de tal forma que se agregan por el orden de llegada
Parámetros: Cola nuevo, cola de solicitudes, cantidad de procesos a trasladar
Retorna: Ninguno
*/
void seleccionarProcesosColaNuevos(cola *, cola *, int );

/*
Función: Obtiene procesos de una cola y se trasladan a otra
Parámetros: Cola nuevo, cola de solicitudes
Retorna: Ninguno
*/
void obtenerProcesoColaSolicitud(cola *, cola *);

/*
Función: Permite remover nodos con procesos
Parámetros: Cola nuevo, id del proceso
Retorna: Ninguno
*/
void desapilarDeColaSolicitud(cola *,int);

/*
Función: Permite agregar nodos a la cola de listos
Parámetros: Cola nuevo, id del proceso
Retorna: Ninguno
*/
void agregarColaListos(cola *,int, int, int, int , int, int,int );

/*
Función: Permite seleccionar los procesos de la cola de solicitudes
y pasarlos a la cola de listos, al seleccionar
los agrega por tiempo de llegada, aplicando SJF
Parámetros: Cola solicitudes, cola listos, n cantidad de procesos deseados
Retorna: Ninguno
*/
void seleccionarProcesoColaListos(cola *, cola *, int );

/*
Función: Permite obtener un nodo con un proceso de la cola
de listos y trasladarlo a la cola de E/S
Parámetros: Cola listos, cola E/S
Retorna: Ninguno
*/
void obtenerProcesoColaListos(cola *, cola *);

/*
Función: Permite remover un nodo con proceso
de la cola de listos
Parámetros: Cola listos, id del proceso
Retorna: Ninguno
*/
void desapilarDeColaListo(cola *,int);

/*
Función: Permite trasladar un nodo de la
cola de listos a la cola E/S
Parámetros: Cola listos, Cola E/S
Retorna: Ninguno
*/
void obtenerProcesoColaListosES(cola *cl, cola *ca);


/*
Función: Permite verificar la cantidad de iteraciones
de un proceso
Parámetros: id del proceso
Retorna: true or false
*/
bool verificarIteraciones(int );

/*
Función: Permite recorrer la cola de E/S y alterar
la variable de tiempo de espera de todos los procesos
Parámetros: Cola E/S
Retorna: ninguno
*/
void reducirTiempoEsperaColaES(cola);

/*
Función: Permite trasladar un nodo con proceso
de la cola de E/S a la cola de listos cuando
se agote el tiempo de espera
Parámetros: Cola E/S, cola listos
Retorna: ninguno
*/
void obtenerProcesoColaESListos(cola *ces, cola *cl);

/*
Función: Permite remover un nodo con proceso
de la cola E/S
Parámetros: Cola E/S, id del proceso
Retorna: ninguno
*/
void desapilarDeColaES(cola *,int);

/*
Función: Permite verificar si la cola
está vacia
Parámetros: Cola de listos
Retorna: ninguno
*/
bool verificarCola(cola);

/*
Función: Permite mostrar todos los nodos y sus procesos
Parámetros: Cola de listos
Retorna: ninguno
*/
void mostrarColas(cola );

/*
Función: Permite verificar si hay algún proceso
si se le agotó su tiempo de espera 
Parámetros: Cola de E/S
Retorna: ninguno
*/
void verificarTiempoEspera(cola);

/*
Función: Permite solicitar una cantidad n de
memoria aleatorio cada vez que el proceso entre
a ejecución
Parámetros: Ninguno
Retorna: ninguno
*/
int solicitarMemoria();

/*
Función: Permite mostrar los procesos que han
tomados segmentos del modelo de listas ligadas
Parámetros: Lista ligada
Retorna: ninguno
*/
void mostrarListaLigada(listaLigada );

/*
Función: Calcula la cantidad de bloques que necesita un proceso
dividiendo la solicitud de memoria entre 64 y sumando 1 para 
redondear
Parámetros: Cantidad de solicitud de memoria
Retorna: cantidad de bloques necesarios
*/
int calcularCantidadBloquesProceso(int );

/*
Función: Permite buscar segmentos libres para
un proceso en la lista ligada
Parámetros: id del proceso, lista ligada, cantidad de solicitud de memoria
Retorna: Ninguno
*/
void buscarSegmentoListaLigada( int , listaLigada, int );

/*
Función: Permite eliminar de la lista ligada todos
los segmentos ocupados por un proceso
Parámetros: id del proceso, lista ligada
Retorna: Ninguno
*/
void removerProcesoListaLigada( int , listaLigada );

/*
Función: Permite guardar en fichero datos del
desperdicio interno del modelo lista ligada
Parámetros: cantidad de desperdicio interno por cada asignación
Retorna: Ninguno
*/
void escribirEnArchivoDILL(int );

/*
Función: Permite guardar en fichero datos del
desperdicio externo del modelo lista ligada
Parámetros: cantidad de desperdicio externo por cada asignación
Retorna: Ninguno
*/
void escribirEnArchivoDELL(int);

/*
Función: Permite leer el fichero de desperdicio externo
de la lista ligada y calcular la cantidad
Parámetros: lista ligada
Retorna: cantidad total de desperdicio externo
*/
int calcularDesperdicioExternoLL(listaLigada);

/*
Función: Permite guardar datos de tiempos de espera 
(promedio por iteracion) cuando se utiliza el modelo de listas ligadas
Parámetros: promedio total durante cada ejecución
Retorna: ninguno
*/
void escribirEnArchivoPromedioEspera(int promedio);

/*
Función: Permite calcular el promedio de espera
de la cola E/S 
Parámetros: Cola E/S
Retorna: ninguno
*/
int calcularPromedioEspera(cola c);

/*
Función: Permite mostrar todos los datos de rendimiento
del modelo lista ligada
Parámetros: Ninguno
Retorna: ninguno
*/
void mostrarEstadisticasListaLigada();


/*
Función: Permite guardar datos de finalización
de procesos desde que inician hasta que terminan
Parámetros: Tiempo de finalización de un proceso
Retorna: ninguno
*/
void escribirEnArchivoPromedioFinalizados(int );

/*
Función: Permite dejar las colas por default sin
valores
Parámetros: Ninguno
Retorna: ninguno
*/
void limpiarColas();

void seleccionarProcesosRespaldo(cola);

/*
Función: Permite recorrer el modelo de socios (arbol binario)
en busca de un bloque que se ajuste a su solicitud redondeandolo
2^n 
que se asignen
Parámetros: Raiz del arbol, id del proceso, cantidad de solicitud de memoria, redondeo de la solicitud 2^n
Retorna: ninguno
*/
void asignarMemoriaSocios(struct Socio* raiz, int id, int solicitud, int redondeo) ;

/*
Función: Permite guardar el dato de finalización de cada proceso
cuando se utiliza el sistema de socios
que se asignen
Parámetros: Tiempo de finalización
Retorna: ninguno
*/
void escribirEnArchivoPromedioFinalizadosSocios(int cantidad);

/*
Función: Permite recorrer el árbol binario del modelo socios en
pre-orden y eliminar los datos del proceso
que se asignen
Parámetros: Raíz del árbol, id del proceso
Retorna: ninguno
*/
void eliminarProcesoSocios(struct Socio* raiz, int id);

/*
Función: Muestra las estadísticas del modelo socios
y el rendimiento
que se asignen
Parámetros: ninguno
Retorna: ninguno
*/
void mostrarEstadisticasSocios();

/*
Función: Permite guardar el promedio de espera en un fichero por cada
iteración cuando se ejecute el modelo de socios
Parámetros: total del promedio de tiempo de espera
Retorna: ninguno
*/
void escribirEnArchivoPromedioEsperaSocios(int promedio);

/*
Función: Permite crear un nodo para el arbol binario
Parámetros: tamaño total del bloque de memoria 2^n, id del proceso default 0
Retorna: Nodo socio
*/
struct Socio* crearNodo(int tamanio, int procesoid);

/*
Función: Permite buscar nodos libres del arbol binario
Parámetros: raíz del árbol
Retorna: ninguno
*/
void verificarBloquesLibresSocios(struct Socio* root);

/*
Función: Permite agregar nodo hijo a la izquierda
Parámetros: raíz del árbol, tamaño del bloque, id del proceso
Retorna: Nodo socio
*/
struct Socio* insertarIzquierda(struct Socio* raiz, int tam, int procesoid);

/*
Función: Permite agregar nodo hijo a la derecha
Parámetros: raíz del árbol, tamaño del bloque, id del proceso
Retorna: Nodo socio
*/
struct Socio* insertarDerecha(struct Socio* raiz, int tam, int procesoid);

/*
Función: Permite buscar un redondeo 2^n de una solicitud
de memoria de un proceso
Parámetros: solicitud de memoria del proceso
Retorna: numero redondeado
*/
int buscarNumeroPotencia(int num);

/*
Función: Permite recorrer el modelo de sistema
de socios
Parámetros: raíz del árbol
Retorna: ninguno
*/
void recorrerArbolSociosPreOrden(struct Socio* root);

/*
Función: Permite contar la cantidad de bloques libres de la lista ligada
Parámetros: id del proceso, solicitud de memoria, lista ligada
Retorna: true or false
*/
bool contarCantidadBloquesLibresLL(int id, int solicitud, listaLigada ll );

/*
Función: Permite agregar un proceso a la memoria virtual (lista) en caso
haya desbordamiento de memoria
Parámetros: lista de memoria virtual, id del proceso, solicitud de memoria
Retorna: ninguno
*/
void agregarProcesoMemoriaVirtual(memoriaVirtual *mv,int id,int cantMemoria);

/*
Función: Permite recorrer la memoria virtual y ver los procesos que han
solicitado memoria
Parámetros: lista de memoria virtual
Retorna: ninguno
*/
void mostrarMemoriaVirtual(memoriaVirtual mv);

/*
Función: Permite recorrer el mapa de bits (array) para buscar
bloques de 64k libres para los procesos, según la cantidad
de bloques que necesite el proceso, será la cantidad de bloques
que se asignen
Parámetros: Ninguno
Retorna: ninguno
*/
void asignarProcesoMapaBits(int idProceso, int SM);

/*
Función: Permite guardar el promedio de finalizados
cuando se esté utilizando mapa de bits
Parámetros: total promedio
Retorna: ninguno
*/
void escribirEnArchivoPromedioFinalizadosMapaBits(int cantidad);

/*
Función: Permite guardar el promedio de tiempo de espera
cuando se esté utilizando mapa de bits
Parámetros: total promedio
Retorna: ninguno
*/
void escribirEnArchivoPromedioEsperaMapaBits(int promedio);

/*
Función: Permite contar la cantidad de bloques libres
en el mapa de bits
Parámetros: entero
Retorna: ninguno
*/
bool contarCantidadBloquesLibresMapaBits(int solicitud);

/*
Función: Permite mostrar todos los procesos con sus bloques
asignados en el mapa de bits
Parámetros: ninguno
Retorna: ninguno
*/
void mostrarMapaBits();

/*
Función: Permite recorrer el mapa de bits y eliminar
información del proceso
Parámetros: id del proceso
Retorna: ninguno
*/
void eliminarProcesosDelMapa( int idProceso);

/*
Función: Permite recorrer la memoria virtual y
eliminar información de los procesos
Parámetros: lista de la memoria virtual, id del proceso
Retorna: ninguno
*/
void eliminarProcesoMemoriaVirtual(memoriaVirtual *mv,int id);

/*
Función: Permite mostrar todas las estadisticas del
modelo de mapa de bits
Parámetros: ninguno
Retorna: ninguno
*/
void mostrarEstadisticasMapaBits();

/*
Función: Permite calcular el desperdicio externo
del sistema de socios, se guarda en una variable
Parámetros: raíz del arbol
Retorna: ninguno
*/
void calcularDesperdicioExternoSocio(struct Socio* root); 

/*
Función: Permite calcular el promedio de tiempo
de ejecución según la ráfaga de cada proceso
Parámetros: cola de solicitudes
Retorna: ninguno
*/
int calcularPromedioTiempoEjecucion(cola c);
