#define TAMANIOBLOQUESEGMENTO 64 //tama�o del bloque del mapa de bits por default
#define TOTALSEGMENTOSLISTA 25 //total de bloques de la lista ligada
#define TAMANIOBLOQUEARRAY 30 //total de bloques del mapa de bits


struct MapaBits{
	int id;
	bool estado; //true or false
	int tamBloque;
	int memoriaUsada;
	int memoriaLibre;
};
//Estructura mapa de bits
struct MapaBits arrayBits[TAMANIOBLOQUEARRAY];

//Variables generales
int cantidadProcesos = 0;
pthread_t administrador;
pthread_t *procesos;
int contadorEjecucion = 0;
bool bandera = true;
int totalProcesosTerminados = 0;
int totalProcesosTerminadosLL = 0;
int totalProcesosTerminadosMB = 0;
int totalProcesosTerminadosSocios = 0;
bool colaListoVacia = false;
pthread_mutex_t semaforo = PTHREAD_MUTEX_INITIALIZER; 
FILE *fp;
int seleccionarListos = 0;
int tiempoEspera = 0;
int tiempoPromedioEjecucionLL = 0;
int tiempoPromedioEjecucionMB= 0;
int tiempoPromedioEjecucionSocios= 0;
int contarBloquesLibresArbol = 0;
int desperdicioExternoSocios = 0;
int totalSocios = 16;

//Control de banderas de ejecuci�n
bool banderaListas = true;
bool banderaMapa = false;
bool banderaSocios = false;
bool banderaEjecucion = true;

//Estructura de la informaci�n del proceso
struct Proceso{
	int id;
	int iteracionesES;
	int cantidadMemoria;
	int pilaCodigo; //cola de listos
	int rafaga;
	int tiempoLlegada; //cola solicitudes
	int tiempoEspera; //cola de e/s
	int tiempoFinalizacion;
};

//Estructura del bloque de memoria auxiliar (sin uso)
struct BloqueMemoria{
	int procesoid;
	int tamBloque;
	bool estado;
		
};

//Nodo para las colas
struct Nodo{ 
    struct Proceso dato; //Dato principal
    struct Nodo *siguiente; //Puntero al siguiente nodo

};
//Estructura del segmento de la lista ligada
struct Segmento{
	int id;
	bool estado;
	int longitud;
	int memoriaUsada;
	int memoriaLibre;
};

//Estructura para el bloque de memoria virtual
struct BloqueVirtual{
	int id;
	bool estado;
	int totalMemoriaReservada;
};
//Nodo para manejar la memoria virtual de la colas
struct NodoMemoriaVirtual{
	struct BloqueVirtual dato;
	struct NodoMemoriaVirtual *siguiente;
};

//Nodo para la lista ligada
struct NodoSegmento{
	struct Segmento dato;
	struct NodoSegmento *siguiente;
};

//Definici�n de tipos de datos para un manejo m�s f�cil
typedef struct Nodo COLA;
typedef struct NodoSegmento LISTALIGADA;
typedef struct NodoMemoriaVirtual MEMORIAVIRTUAL;

typedef COLA *cola;
typedef LISTALIGADA *listaLigada;
typedef MEMORIAVIRTUAL *memoriaVirtual;

//Declaraci�n de colas
cola colaAuxiliar = NULL;
cola colaRespaldo = NULL;
cola colaS = NULL;
cola colaL = NULL;
cola colaES = NULL;
listaLigada lista = NULL;
memoriaVirtual mv = NULL;



int *desperdicioInternoListaLigada ;
bool calculoPromedioEspera = true;
int duracionProceso = 0;

//Estructura para cada bloque del sistema de socios
struct Socio {
  int id_Proceso;
  int tam;
  int solicitudMemoria;
  bool estado;
  struct Socio* padre;
  struct Socio* izquierda;
  struct Socio* derecha;
};

//Estructura arbol binario para el sistema de socios
struct Socio* raiz = NULL;
int contadorSocios = 0; //contador de reseteo de asignaci�n


