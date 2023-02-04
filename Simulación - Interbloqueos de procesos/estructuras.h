#define TOTALRECURSOS 3


pthread_t administrador;
pthread_t *hiloSolicitudes;
pthread_mutex_t semaforo = PTHREAD_MUTEX_INITIALIZER; 
pthread_mutex_t semaforo2 = PTHREAD_MUTEX_INITIALIZER; 
int cantidadSolicitudes = 0;
int contadorEjecucion = 0;
bool banderaEjecucion = true;
int** matrizMaximos;
int** matrizAsignados;
int** matrizRestantes; 
int** matrizTareas;
int recursosDisponibles[3] = {18,10,14};
int *finalizados;
int solicitudContador = 0;
int tiempoAux = 0;

/*
	Entero tipo mecanicos
	1 Electricistas,
	2 pintores, 	
	3 Mecánicos de motor, 	
	4 Mecánicos de Caja,
	5 Mecánicos de rótulas y suspensión,
	6 mecánico de gases, 	
	7 llanteros


*/

typedef enum {
	ELECTRICISTA,
	PINTOR,
	MOTOR,
	CAJA,
	ROTULAS,
	GASES,
	LLANTERO
}tipoMecanico;

typedef enum{
	GATA_HIDRAULICA,
	PISTOLA_PINTAR,
	TORNO,
	SOLDADORA,
	SOPLADORA,
	SANITARIO
	
}tipoMaquina;


typedef enum{
	TELEFONO,
	JUEGOCUBOS,
	RASH,
	DESATORNILLADORF,
	DESATORNILLADORPP,
	ALICATE,
	JUEGOLLAVES
}tipoHerramienta;

struct Cubo{
	int numeracion;
	int sol;
	bool estado;
};

struct Llave{
	int numeracion;
	int sol;
	bool estado;
};

struct Mecanico{
	int id;
	tipoMecanico tipo;
	int idSolicitud;
	bool estado;
	int tiempo;
	bool apropiativo;
};

/*
	Entero tipo maquinas
	1 gatas hidráulicas
	2- pistola de pintar,
	3 torno, 	
	4 soldadora,
	5 sopladoras,
	6 servicio sanitario   


*/

struct Maquina{
	int id;
    int idSolicitud;
	bool estado;
	tipoMaquina tipo;
	int tiempo;
	bool apropiativo;
};

/*
	Entero tipo herramientas
		1 - Telefono,
		2  Juego de cubos numeración del 1 al 30
		3  Rash(llave para uso de los cubos),
		4 desatornilladores filips,
		5 desatornilladores corrientes, 	punta plana
		6 alicates,
		7 juego de llaves fijas del 10 al 30 (si los cubos estan ocupadaos y hay llave de esta numeración puede tomarla) Sirven para reemplazar los cubos


*/
struct Herramienta{
	int id;
	bool estado;
	tipoHerramienta tipo;
	bool apropiativo;
	int tiempo;
	int numeracionCubo;
	int numeracionLlave;
	int idSolicitud;
	
	
};
//
//struct NodoMecanico{
// 	struct Mecanico mecanico;
// 	struct NodoMecanico *siguiente;
//};
//
//
//
//struct NodoHerramienta{
// 	struct Herramienta herramienta;
// 	struct NodoMecanico *siguiente;
//};
//
//struct NodoMaquina{
// 	struct Maquina maquina;
// 	struct NodoMecanico *siguiente;
//};



struct Solicitud{
	int id; //0 a n
	int numeroPlaca;
	int totalTiempo ;
	bool asignado;
	int totalMecanicosAsignados;
	int totalMaquinasAsignadas;
	int totalHerramientasAsignadas;
	int *listaMecanicos;
	int *listaMaquinas;
	int *listaHerramientas;
	int *auxMecID;
	int *auxMaqID;
	int *auxHerrID;
	bool rollback;
	bool finalizado;
	int iteraciones;
	
};

struct NodoSolicitud{
 	struct Solicitud dato;
 	struct NodoSolicitud *siguiente;
};

struct NodoListo{
	struct Solicitud dato;
	struct NodoListo *siguiente;
};

struct NodoRecurso{
	int dato;
	struct NodoRecurso *siguiente;
};

typedef struct NodoSolicitud COLASOLICITUD;
typedef COLASOLICITUD *solicitudes;
typedef struct NodoListo COLALISTO;
typedef COLALISTO *solicitudesListas;
typedef struct NodoRecurso LISTAID;
typedef LISTAID *listaid;

solicitudes colaSolicitudes = NULL;
solicitudesListas colaListos = NULL;
solicitudesListas temporal = NULL;
listaid mecan = NULL;
listaid maq = NULL;
listaid herr = NULL;

struct Mecanico mecanicos[18];
struct Maquina maquinas[10];
struct Herramienta herramientas[14];
struct Cubo cubos[30];
struct Llave llaves[21];



