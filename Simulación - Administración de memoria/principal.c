#include <pthread.h>
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <time.h>
#include <stdbool.h>
#include <math.h>


#include "estructuras.h"
#include "prototipos.h"


void crearColaNuevos(cola *colaAux, int cantidadProcesos){
	srand(time(NULL)); 
	
	int i = 0;
	while(i < cantidadProcesos){
		int id = (rand() %(9999 - 1000 + 1)) + 1000;
		int iteracionesES = (rand() %(5- 1 + 1)) + 1;
		int cantidadMemoria = (rand() %(250 - 100 + 1)) + 100;
		int pilaCodigo = (rand() %(1000 - 100 + 1)) + 100;;
		int rafaga = (rand() %(500 - 100 + 1)) + 100;;
		int tiempoLlegada = (rand() %(200 - 10 + 1)) + 10;
		int tiempoEspera = 0;
		apilarAColaNuevos(colaAux,id,iteracionesES,cantidadMemoria,pilaCodigo,rafaga, tiempoLlegada, tiempoEspera);
		i++;
	}
	
   
	
}

void apilarAColaNuevos(cola *colaS,int id, int iteraciones, int cantMemoria, int pila, int rafaga, int tiempoLlegada, int tiempoEspera){
    cola nuevoNodo, actualNodo; 
    struct Proceso nuevoProceso;
    
    nuevoProceso.id = id;
    nuevoProceso.iteracionesES = iteraciones;
    nuevoProceso.cantidadMemoria = cantMemoria;
    nuevoProceso.pilaCodigo = pila;
    nuevoProceso.rafaga = rafaga;
    nuevoProceso.tiempoLlegada = tiempoLlegada;
    nuevoProceso.tiempoEspera = tiempoEspera;
     nuevoProceso.tiempoFinalizacion = 0;
    
    nuevoNodo = malloc(sizeof(COLA)); 
    if(nuevoNodo != NULL) { 
    	
        nuevoNodo->dato = nuevoProceso;
        nuevoNodo->siguiente = NULL;
        
        actualNodo = *colaS;
        nuevoNodo->siguiente = *colaS;
        *colaS = nuevoNodo;
    }else{
        printf("Proceso no insertado, sin memoria disponible.\n");
    }
}

void desapilarDeColaNuevo(cola *colaAux,int id){
    cola temporal; 
    if(id== (*colaAux)->dato.id ){ 
        temporal = (*colaAux);
        *colaAux = (*colaAux)->siguiente; 
        free(temporal); 
        temporal = NULL;
    }
}

void seleccionarProcesosColaNuevos(cola *cn, cola *cs, int consumirProcesos){
	int total = 0;
	while(total < consumirProcesos && ((*cn)!=NULL)){
		obtenerProcesoColaNuevos(cn,cs);
		total++;		
	}
}

void obtenerProcesoColaNuevos(cola *cn, cola *cs){
	agregarColaSolicitud(cs,(*cn)->dato.id,(*cn)->dato.iteracionesES,(*cn)->dato.cantidadMemoria,(*cn)->dato.pilaCodigo,(*cn)->dato.rafaga,(*cn)->dato.tiempoLlegada, (*cn)->dato.tiempoEspera);
//	agregarColaSolicitud(&colaRespaldo,(*cn)->dato.id,(*cn)->dato.iteracionesES,(*cn)->dato.cantidadMemoria,(*cn)->dato.pilaCodigo,(*cn)->dato.rafaga,(*cn)->dato.tiempoLlegada, (*cn)->dato.tiempoEspera);
	desapilarDeColaNuevo(cn,(*cn)->dato.id); 
}

void seleccionarProcesosColaSolicitud(cola *cs, cola *cl, int consumirProcesos){
	int total = 0;
	while(total < consumirProcesos && ((*cs)!=NULL)){
		obtenerProcesoColaSolicitud(cs,cl);
		total++;		
	}
}



void obtenerProcesoColaSolicitud(cola *cn, cola *cs){
	agregarColaListos(cs,(*cn)->dato.id,(*cn)->dato.iteracionesES,(*cn)->dato.cantidadMemoria,(*cn)->dato.pilaCodigo,(*cn)->dato.rafaga,(*cn)->dato.tiempoLlegada,(*cn)->dato.tiempoEspera);
	desapilarDeColaSolicitud(cn,(*cn)->dato.id);
}

void agregarColaSolicitud(cola *cs,int id, int iteraciones, int cantMemoria, int pila, int rafaga, int tiempoLlegada, int tiempoEspera){
	cola anterior, actual,nuevo; 
	struct Proceso nuevoProceso;
    
    nuevoProceso.id = id;
    nuevoProceso.iteracionesES = iteraciones;
    nuevoProceso.cantidadMemoria = cantMemoria;
    nuevoProceso.pilaCodigo = pila;
    nuevoProceso.rafaga = rafaga;
    nuevoProceso.tiempoLlegada = tiempoLlegada;
  	nuevoProceso.tiempoEspera = tiempoEspera;
    
    nuevo = malloc(sizeof(COLA)); 
    if(nuevo != NULL) { 
       
		nuevo->dato = nuevoProceso; 
        nuevo->siguiente = NULL;
        
        
        anterior = NULL;
        actual = *cs; 
        while(actual != NULL && (nuevoProceso.tiempoLlegada > actual->dato.tiempoLlegada)){ 
		
            anterior = actual;
            actual = actual->siguiente;
        }
        if (anterior == NULL) { 
            nuevo->siguiente = *cs; 
            *cs = nuevo; 
        }else{ 
            
            
			anterior->siguiente = nuevo; 
            nuevo->siguiente = actual; 
        }
    }else{
        printf("Error al reservar memoria\n");
    }
	
}

void desapilarDeColaSolicitud(cola *colaAux,int id){
    cola temporal; 
    if(id== (*colaAux)->dato.id ){ 
        temporal = (*colaAux);
        *colaAux = (*colaAux)->siguiente; 
        free(temporal); 
        temporal = NULL;
    }
}


void obtenerProcesoColaListos(cola *cn, cola *cs){
	agregarColaListos(cs,(*cn)->dato.id,(*cn)->dato.iteracionesES,(*cn)->dato.cantidadMemoria,(*cn)->dato.pilaCodigo,(*cn)->dato.rafaga,(*cn)->dato.tiempoLlegada,(*cn)->dato.tiempoEspera);
	desapilarDeColaSolicitud(cn,(*cn)->dato.id); 
}

void agregarColaListos(cola *cl,int id, int iteraciones, int cantMemoria, int pila, int rafaga, int tiempoLlegada, int tiempoEspera){
	cola anterior, actual,nuevo; 
	struct Proceso nuevoProceso;
    
    nuevoProceso.id = id;
    nuevoProceso.iteracionesES = iteraciones;
    nuevoProceso.cantidadMemoria = cantMemoria;
    nuevoProceso.pilaCodigo = pila;
    nuevoProceso.rafaga = rafaga;
    nuevoProceso.tiempoLlegada = tiempoLlegada;
    nuevoProceso.tiempoEspera = tiempoEspera;
    
    nuevo = malloc(sizeof(COLA)); 
    if(nuevo != NULL) { 
       
		nuevo->dato = nuevoProceso; 
        nuevo->siguiente = NULL;
        
        
        anterior = NULL;
        actual = *cl; 
        while(actual != NULL && (nuevoProceso.pilaCodigo > actual->dato.pilaCodigo)){ 
		
            anterior = actual;
            actual = actual->siguiente;
        }
        if (anterior == NULL) { 
            nuevo->siguiente = *cl; 
            *cl = nuevo; 
        }else{ 
            
            
			anterior->siguiente = nuevo; 
            nuevo->siguiente = actual; 
        }
    }else{
        printf("Error al reservar memoria\n");
    }
	
}



void desapilarDeColaListo(cola *colaAux,int id){
    cola temporal; 
    if(id== (*colaAux)->dato.id ){ 
        temporal = (*colaAux);
        *colaAux = (*colaAux)->siguiente; 
        free(temporal); 
        temporal = NULL;
    }
}


void agregarColaES(cola *cl,int id, int iteraciones, int cantMemoria, int pila, int rafaga, int tiempoLlegada, int tiempoEspera){
	cola anterior, actual,nuevo; 
	struct Proceso nuevoProceso;
    
    nuevoProceso.id = id;
    nuevoProceso.iteracionesES = iteraciones;
    nuevoProceso.cantidadMemoria = cantMemoria;
    nuevoProceso.pilaCodigo = pila;
    nuevoProceso.rafaga = rafaga;
    nuevoProceso.tiempoLlegada = tiempoLlegada;
    nuevoProceso.tiempoEspera = tiempoEspera;
    
    nuevo = malloc(sizeof(COLA)); 
    if(nuevo != NULL) { 
       
		nuevo->dato = nuevoProceso; 
        nuevo->siguiente = NULL;
        
        
        anterior = NULL;
        actual = *cl; 
        while(actual != NULL ){ 
		
            anterior = actual;
            actual = actual->siguiente;
        }
        if (anterior == NULL) { 
            nuevo->siguiente = *cl; 
            *cl = nuevo; 
        }else{ 
            
            
			anterior->siguiente = nuevo; 
            nuevo->siguiente = actual; 
        }
    }else{
        printf("Error al reservar memoria\n");
    }
	
}



void seleccionarProcesoColaListos(cola *cl, cola *ca, int consumirProcesos){
	int total = 0;
	while(total < consumirProcesos && ((*cl)!=NULL)){
		obtenerProcesoColaListosES(cl,ca);
		total++;		
	}
	
}

void obtenerProcesoColaListosES(cola *cl, cola *ca){
	agregarColaES(ca,(*cl)->dato.id,(*cl)->dato.iteracionesES,(*cl)->dato.cantidadMemoria,(*cl)->dato.pilaCodigo,(*cl)->dato.rafaga,(*cl)->dato.tiempoLlegada,(*cl)->dato.tiempoEspera);
	desapilarDeColaListo(cl,(*cl)->dato.id); 
}

void seleccionarProcesoColaES(cola *ces, cola *cl, int consumirProcesos){
	int total = 0;
	while(((*ces)!=NULL) && (*ces)->dato.tiempoEspera == 0) {
	
		obtenerProcesoColaESListos(ces,cl);
		total++;		
	}
}

void obtenerProcesoColaESListos(cola *ces, cola *cl){
	agregarColaListos(cl,(*ces)->dato.id,(*ces)->dato.iteracionesES,solicitarMemoria(),(*ces)->dato.pilaCodigo,(*ces)->dato.rafaga,(*ces)->dato.tiempoLlegada,0);
	desapilarDeColaES(ces,(*ces)->dato.id); 
}



void desapilarDeColaES(cola *colaAux,int id){
    cola temporal; 
    if(id== (*colaAux)->dato.id ){ 
        temporal = (*colaAux);
        *colaAux = (*colaAux)->siguiente; 
        free(temporal); 
        temporal = NULL;
    }
}



bool verificarIteraciones(int iteraciones){

	if(iteraciones != 0){
		return true;
	}
	return false;
}

void mostrarColas(cola c){
    
   pthread_mutex_lock(&semaforo); 
    if(c== NULL){ 
        printf("Cola sin procesos disponibles.\n");
    }else{ 
    	printf("%-15s%-15s%-15s%-15s%-15s%-15s%-15s\n", "PID", "Memoria", "Iteraciones", "Rafaga", "Tiempo llegada", "Pila", "T.Espera");
        while (c!= NULL ) {
        	printf("%-15d%-15d%-15d%-15d%-15d%-15d%-15d\n", c->dato.id, c->dato.cantidadMemoria, c->dato.iteracionesES, c->dato.rafaga, c->dato.tiempoLlegada, c->dato.pilaCodigo,c->dato.tiempoEspera);	
            
            c = c->siguiente; 
        }
        
    }
   pthread_mutex_unlock(&semaforo); 
}


bool colasLlenadas = false;
void *rutinaMapas(void *arg){
	
	if(colasLlenadas == false){
		crearColaNuevos(&colaAuxiliar,cantidadProcesos);
		seleccionarProcesosColaNuevos(&colaAuxiliar, &colaS, cantidadProcesos);
		seleccionarProcesosColaSolicitud(&colaS, &colaL, 5);
		tiempoPromedioEjecucionMB = calcularPromedioTiempoEjecucion(colaS);
		colasLlenadas = true;
	}
	
		
		if(verificarCola(colaL)){
			

			
			if(colaL->dato.id > 0){
				calculoPromedioEspera = true;
				colaL->dato.tiempoFinalizacion = 	colaL->dato.tiempoLlegada+ duracionProceso;
				printf("-----------------------------------------------------------------------\n");
				printf("En ejecucion:\n");
				printf("Proceso ID: %d\n",colaL->dato.id);
				printf("-----------------------------------------------------------------------\n");
				//int cantidadBloques = calcularCantidadBloquesProceso(colaL->dato.cantidadMemoria) ;
				
				if(contarCantidadBloquesLibresMapaBits(colaL->dato.cantidadMemoria)){
					asignarProcesoMapaBits(colaL->dato.id,colaL->dato.cantidadMemoria);	
					printf("\n");
					mostrarMapaBits();
					printf("\n");
				}else{
					agregarProcesoMemoriaVirtual(&mv,colaL->dato.id,colaL->dato.cantidadMemoria);
					mostrarMemoriaVirtual(mv);
					printf("\n");
				}
				
	
				
			}
			
			
			if(colaL->dato.iteracionesES == 0){
			
				escribirEnArchivoPromedioFinalizadosMapaBits(colaL->dato.tiempoFinalizacion);
				eliminarProcesosDelMapa(colaL->dato.id);
				
				eliminarProcesoMemoriaVirtual(&mv,colaL->dato.id);
				desapilarDeColaListo(&colaL,colaL->dato.id);
				totalProcesosTerminados++;
				totalProcesosTerminadosMB++;
				
				if(totalProcesosTerminados == cantidadProcesos){
						
						sleep(1);
						//mostrarEstadisticasMapaBits();
							colasLlenadas = false;
						banderaMapa = false;
						contadorEjecucion = 0;
						banderaSocios = true;
						totalProcesosTerminados = 0;
						
				}
				
				printf("Total de procesos terminados: %d\n",totalProcesosTerminados);
			}else{
				
			//	printf("Tiempo de finalizacion: %d\n",var);
				colaL->dato.iteracionesES = colaL->dato.iteracionesES-1;
				colaL->dato.tiempoEspera = tiempoEspera;
				
				//colaL->dato.tiempoFinalizacion += 500;
			}
			
			pthread_mutex_lock(&semaforo); 
			seleccionarProcesoColaListos(&colaL,&colaES,1);
			pthread_mutex_unlock(&semaforo); 
			
		
			
			tiempoEspera = 0;
		}else{
				
				seleccionarProcesosColaSolicitud(&colaS, &colaL, 5); //selecciona 5 procesos para cola de listos
				if(calculoPromedioEspera){
					
					escribirEnArchivoPromedioEsperaMapaBits(calcularPromedioEspera(colaES));
					calculoPromedioEspera = false;
				}
				
				reducirTiempoEsperaColaES(colaES);
				printf("-----------------------------------------------------------------------\n");
				printf("Cola de E/S\n");
				printf("-----------------------------------------------------------------------\n");
				mostrarColas(colaES);
				seleccionarProcesoColaES(&colaES,&colaL,1);
		
		}
		

		printf("\n");
				
		sleep(0);
	

}

void *rutinaSocios(void *arg){
	
	if(colasLlenadas == false){
		crearColaNuevos(&colaAuxiliar,cantidadProcesos);
		seleccionarProcesosColaNuevos(&colaAuxiliar, &colaS, cantidadProcesos);
		seleccionarProcesosColaSolicitud(&colaS, &colaL, 5);
		tiempoPromedioEjecucionSocios = calcularPromedioTiempoEjecucion(colaS);
		colasLlenadas = true;
	}
	
	
		
		if(verificarCola(colaL)){
			
			//printf("Total socios: %d\n", totalSocios);
			
			if(colaL->dato.id > 0){
				calculoPromedioEspera = true;
				colaL->dato.tiempoFinalizacion = 	colaL->dato.tiempoLlegada+ duracionProceso;
				printf("-----------------------------------------------------------------------\n");
				printf("En ejecucion:\n");
				printf("Proceso ID: %d\n",colaL->dato.id);
				printf("-----------------------------------------------------------------------\n");
				//int cantidadBloques = calcularCantidadBloquesProceso(colaL->dato.cantidadMemoria) ;
				
				
				//printf("cont: %d\n", contarBloquesLibresArbol);
				
				
				if(totalSocios > 0){
					asignarMemoriaSocios(raiz,colaL->dato.id,colaL->dato.cantidadMemoria,buscarNumeroPotencia(colaL->dato.cantidadMemoria));
					printf("Modelo: Socios\n");
  					printf("%-15s%-15s%-15s%-15s%\n", "PID", "Estado", "S.Memoria","Tam.Bloque");
					recorrerArbolSociosPreOrden(raiz);
					contadorSocios = 0;
				//	contarBloquesLibresArbol = 0;
					desperdicioExternoSocios = 0;
					totalSocios--;
					
				}else{
					
					agregarProcesoMemoriaVirtual(&mv,colaL->dato.id,colaL->dato.cantidadMemoria);
					printf("\n");
//					printf("%-15s%-15s%-15s%-15s%\n", "PID", "Estado", "S.Memoria","Tam.Bloque");
//					recorrerArbolSociosPreOrden(raiz);
					mostrarMemoriaVirtual(mv);
					printf("\n");
				}

				
			}
			
			
			if(colaL->dato.iteracionesES == 0){
			
				escribirEnArchivoPromedioFinalizadosSocios(colaL->dato.tiempoFinalizacion);
                totalSocios++;
				eliminarProcesoSocios(raiz,colaL->dato.id);
				desapilarDeColaListo(&colaL,colaL->dato.id);
				totalProcesosTerminados++;
				totalProcesosTerminadosSocios++;
				printf("Total terminados: %d: \n",totalProcesosTerminados);
				
				if(totalProcesosTerminados == cantidadProcesos){
						
						sleep(1);
					//	mostrarEstadisticasSocios();
						printf("\n");
						printf("%-15s%-15s%-15s%-15s%\n", "PID", "Estado", "S.Memoria","Tam.Bloque");
						recorrerArbolSociosPreOrden(raiz);
						banderaSocios = false;
						totalProcesosTerminados = 0;
						banderaListas = false;
						banderaMapa = false;
						contadorEjecucion = 0;
						banderaEjecucion = false;
						
				}
				
				//printf("Total de procesos terminados: %d\n",totalProcesosTerminados);
			}else{
				
			//	printf("Tiempo de finalizacion: %d\n",var);
				colaL->dato.iteracionesES = colaL->dato.iteracionesES-1;
				colaL->dato.tiempoEspera = tiempoEspera;
				
				//colaL->dato.tiempoFinalizacion += 500;
			}
			
			pthread_mutex_lock(&semaforo); 
			seleccionarProcesoColaListos(&colaL,&colaES,1);
			pthread_mutex_unlock(&semaforo); 
			
		
			
			tiempoEspera = 0;
		}else{
				
				seleccionarProcesosColaSolicitud(&colaS, &colaL, 5); //selecciona 5 procesos para cola de listos
				if(calculoPromedioEspera){
					
					escribirEnArchivoPromedioEsperaSocios(calcularPromedioEspera(colaES));
					calculoPromedioEspera = false;
				}
				
				reducirTiempoEsperaColaES(colaES);
				printf("-----------------------------------------------------------------------\n");
				printf("Cola de E/S\n");
				printf("-----------------------------------------------------------------------\n");
				mostrarColas(colaES);
				seleccionarProcesoColaES(&colaES,&colaL,1);
		
		}
		

		printf("\n");
				
		sleep(0);
	
	
//	banderaEjecucion = false;
}

void calcularDesperdicioExternoSocio(struct Socio* root) {
  if (root == NULL) return;
  
  if(root->estado == false){
  	desperdicioExternoSocios+=root->tam;
  }
  calcularDesperdicioExternoSocio(root->izquierda);
  calcularDesperdicioExternoSocio(root->derecha);
}
int calcularDesperdicioExternoMapaBits(){
	int contDesperdicioExterno = 0;
	int i = 0;
	for(i=0; i< 30;i++){
		if(arrayBits[i].estado == false){
			contDesperdicioExterno++;
		}

	}
	return contDesperdicioExterno*TAMANIOBLOQUESEGMENTO;
}

void escribirEnArchivoDEM(int desperdicioExterno){
	fp = fopen("desperdicioEMapaBits.txt","a");
	fprintf(fp,"%d\n",desperdicioExterno);
	fclose(fp);
}

void escribirEnArchivoDESocios(int desperdicioExterno){
	fp = fopen("desperdicioESocios.txt","a");
	fprintf(fp,"%d\n",desperdicioExterno);
	fclose(fp);
}

void seleccionarProcesosRespaldo(cola c){
	int total = 0;
	pthread_mutex_lock(&semaforo); 
	if(c== NULL){ 
        printf("Cola sin procesos disponibles.\n");
    }else{ 
    	
        while (c!= NULL ) {
        	agregarColaSolicitud(&colaS,c->dato.id, c->dato.cantidadMemoria, c->dato.iteracionesES, c->dato.rafaga, c->dato.tiempoLlegada, c->dato.pilaCodigo,c->dato.tiempoEspera);
        	total++;
            c = c->siguiente; 
        }
        
    }
    
    printf("Total de procesos de cola respaldo: %d\n",total);
    pthread_mutex_unlock(&semaforo); 
}


void *rutinaListaLigada(void *arg){
		
	
		
		
		
		
		if(verificarCola(colaL)){
			

			
			if(colaL->dato.id > 0){
				calculoPromedioEspera = true;
				colaL->dato.tiempoFinalizacion = 	colaL->dato.tiempoLlegada+ duracionProceso;
				printf("-----------------------------------------------------------------------\n");
				printf("En ejecucion:\n");
				printf("Proceso ID: %d\n",colaL->dato.id);
			
				//int cantidadBloques = calcularCantidadBloquesProceso(colaL->dato.cantidadMemoria) ;
				
				if(contarCantidadBloquesLibresLL(colaL->dato.id,colaL->dato.cantidadMemoria,lista)){
					buscarSegmentoListaLigada(colaL->dato.id,lista,colaL->dato.cantidadMemoria);
					printf("\n");
					mostrarListaLigada(lista);
					printf("\n");
				}else{
					agregarProcesoMemoriaVirtual(&mv,colaL->dato.id,colaL->dato.cantidadMemoria);
					mostrarMemoriaVirtual(mv);
					printf("\n");
				}
				printf("-----------------------------------------------------------------------\n");
				
				
			}
			
			
			if(colaL->dato.iteracionesES == 0){
				//printf("Tiempo finalizacion: %d\n", colaL->dato.tiempoFinalizacion);
				//eliminarProcesoMemoriaVirtual(&mv,colaL->dato.id);
				eliminarProcesoMemoriaVirtual(&mv,colaL->dato.id);
				escribirEnArchivoPromedioFinalizados(colaL->dato.tiempoFinalizacion);
				removerProcesoListaLigada(colaL->dato.id,lista);
				desapilarDeColaListo(&colaL,colaL->dato.id);
				totalProcesosTerminados++;
				totalProcesosTerminadosLL++;
			
				//	printf("Total de procesos terminados: %d\n",totalProcesosTerminados);
				if(totalProcesosTerminados == cantidadProcesos){
						
						sleep(1);
						banderaListas = false;
						colasLlenadas = false;
						mostrarListaLigada(lista);
						//mostrarEstadisticasListaLigada();
						
						banderaMapa = true;
						
						totalProcesosTerminados = 0;
						contadorEjecucion = 0;
						
						
				}
				
			
			}else{
				
			
				colaL->dato.iteracionesES = colaL->dato.iteracionesES-1;
				colaL->dato.tiempoEspera = tiempoEspera;
				
			
			}
			
			pthread_mutex_lock(&semaforo); 
			seleccionarProcesoColaListos(&colaL,&colaES,1);
			pthread_mutex_unlock(&semaforo); 
			
		
			
			tiempoEspera = 0;
		}else{
				
				seleccionarProcesosColaSolicitud(&colaS, &colaL, 5); //selecciona 5 procesos para cola de listos
				if(calculoPromedioEspera){
					
					escribirEnArchivoPromedioEspera(calcularPromedioEspera(colaES));
					calculoPromedioEspera = false;
				}
				
				reducirTiempoEsperaColaES(colaES);
				printf("-----------------------------------------------------------------------\n");
				printf("Cola de E/S\n");
				
				mostrarColas(colaES);
				printf("-----------------------------------------------------------------------\n");
				seleccionarProcesoColaES(&colaES,&colaL,1);
		
		}
		

		printf("\n");
				
		sleep(0);
}

int aumentarTiempoProcesoEjecucion(){
	srand(time(NULL)); 
    int aumentarTiempo = (rand() %(300 - 200 + 1)) + 200;
    
    return aumentarTiempo;
}

void reducirTiempoEsperaColaES(cola c){
    srand(time(NULL)); 
    int reducirTiempo = (rand() %(300 - 200 + 1)) + 200;
   
    if(c== NULL){ 
        printf("Cola sin procesos disponibles.\n");
    }else{ 
    	
        
        while (c!= NULL ) {
        	
        	if(c->dato.tiempoEspera > 0){
        		c->dato.tiempoEspera = c->dato.tiempoEspera-reducirTiempo;
			}else{
				

				c->dato.tiempoEspera = 0;

			}

            c = c->siguiente; 
        }
        
        
        
    }
    
   

}



void verificarIteracionesProcesos(cola c){
	pthread_mutex_lock(&semaforo); 
	if(c == NULL){
		printf("Sin procesos \n");
	}else{
		while (c!= NULL ) {
    		if(c->dato.iteracionesES == 0){
    			
   				desapilarDeColaListo(&colaL,c->dato.id);
			
			}
            c = c->siguiente; 
    	}	
	}
	pthread_mutex_unlock(&semaforo); 
}

void verificarTiempoEspera(cola c){
	pthread_mutex_lock(&semaforo); 
	if(c == NULL){
		printf("Sin procesos en E/S\n");
	}else{
		while (c!= NULL ) {
    		if(c->dato.tiempoEspera == 0){
    			agregarColaListos(&colaL,c->dato.id,c->dato.iteracionesES,c->dato.cantidadMemoria,c->dato.pilaCodigo,c->dato.rafaga,c->dato.tiempoLlegada,0);
   			desapilarDeColaES(&colaES,c->dato.id);
		
			}
            c = c->siguiente; 
    	}	
	}
	pthread_mutex_unlock(&semaforo); 
	
}
void* comenzarEjecucion(void *arg){
	srand(time(NULL)); 
		
	
	
	while(banderaEjecucion){
       
       	
       	if(banderaListas){
       		tiempoEspera = (rand() %(2000- 800 + 1)) + 800;
       		duracionProceso = aumentarTiempoProcesoEjecucion();
       		if (pthread_create(&(procesos[contadorEjecucion]), NULL, &rutinaListaLigada, NULL)!=0){ 
	            printf("Error al crear hilos\n");
	        }
	        pthread_join(procesos[contadorEjecucion], NULL); 
	        contadorEjecucion++; //Contador de turnos
	        if(contadorEjecucion==cantidadProcesos){ 
	            contadorEjecucion=0;
	        }
		}
		if(banderaMapa){
			
			tiempoEspera = (rand() %(2000- 800 + 1)) + 800;
       		duracionProceso = aumentarTiempoProcesoEjecucion();
			if (pthread_create(&(procesos[contadorEjecucion]), NULL, &rutinaMapas, NULL)!=0){ 
	            printf("Error al crear hilos\n");
	        }
	        pthread_join(procesos[contadorEjecucion], NULL); 
	       contadorEjecucion++; //Contador de turnos
	        if(contadorEjecucion==cantidadProcesos){ 
	            contadorEjecucion=0;
	        }
		}
//		
		if(banderaSocios){
			
			//verificarBloquesLibresSocios(raiz);
			calcularDesperdicioExternoSocio(raiz);
			
			tiempoEspera = (rand() %(2000- 800 + 1)) + 800;
       		duracionProceso = aumentarTiempoProcesoEjecucion();
			if (pthread_create(&(procesos[contadorEjecucion]), NULL, &rutinaSocios, NULL)!=0){ 
	            printf("Error al crear hilos\n");
	        }
	        pthread_join(procesos[contadorEjecucion], NULL); 
	        contadorEjecucion++; //Contador de turnos
	        if(contadorEjecucion==cantidadProcesos){ 
	            contadorEjecucion=0;
	        }
		}
		
		if(banderaEjecucion == false){
			printf("Analisis de rendimiento de algoritmos\n");
			mostrarEstadisticasListaLigada();
			mostrarEstadisticasMapaBits();
			mostrarEstadisticasSocios();
			break;
		}
        	
	        
	        //sleep(4);
   	}
	
}





bool verificarCola(cola c){
	if(c == NULL){
		return false;
	}
	
	return true;
}

void iniciarMenu(){
	int index;
	int opcion;
		
	do{
		system("clear");
		
		printf(
		"*********************************\n"
		"*                               *\n"
	    "*[1] Empezar ejecucion            *\n"
	    "*[2] Salir           *\n"
	    "*                               *\n"
		"*********************************\n");
	    printf("Opcion: ");
        scanf("%d", &opcion); //Ingreso de la opción
        
        switch(opcion){
        	
        	
			
			case 1:{
				
				//EMPEZAR JUEGO
				//Aquí estaría el hilo administrador iniciando todo
				pthread_create(&(administrador), NULL, &comenzarEjecucion, NULL);
                pthread_join(administrador, NULL);
				break;
				
			}
			case 2:{
				
				exit(0);
				break;
			}
			
			default:{
				break;
			}
		}
		
		
	}while(opcion != 2);
}

void llenarArrayDesperdicioInternoLL(int *di, int tam){
	int i = 0;
	for(i ; i < tam; i++){
		di[i] = 0;
	}	
}

void recorrerDesperdicio(int *di, int tam){
	int i = 0;
	for(i ; i < tam; i++){
		printf("%d\n",di[i] );
	}
}

void agregarAListaLigada(listaLigada *ll, int id, bool estado, int longitud){
	listaLigada anterior, actual,nuevo; 
	struct Segmento nuevoSegmento;
	nuevoSegmento.id = id;
	nuevoSegmento.estado = estado;
	nuevoSegmento.longitud = longitud;
	nuevoSegmento.memoriaLibre = 0;
	nuevoSegmento.memoriaUsada = 0;
	
    nuevo = malloc(sizeof(COLA)); 
    if(nuevo != NULL) { 
       
		nuevo->dato = nuevoSegmento; 
        nuevo->siguiente = NULL;
        
        
        anterior = NULL;
        actual = *ll; 
        while(actual != NULL){ 
		
            anterior = actual;
            actual = actual->siguiente;
        }
        if (anterior == NULL) { 
            nuevo->siguiente = *ll; 
            *ll = nuevo; 
        }else{ 
            
            
			anterior->siguiente = nuevo; 
            nuevo->siguiente = actual; 
        }
    }else{
        printf("Error al reservar memoria\n");
    }
	
}

void mostrarListaLigada(listaLigada ll){
	if(ll== NULL){ 
        printf("Sin segmentos disponibles.\n");
    }else{ 
    	printf("Modelo: Lista ligada\n");
    	printf("%-15s%-15s%-15s%-15s%-15s%\n", "PID", "Estado", "T.Bloque", "Memoria usada", "Memoria libre");
        while (ll!= NULL) {
        	printf("%-15d%-15d%-15d%-15d%-15d%\n", ll->dato.id,ll->dato.estado,ll->dato.longitud,ll->dato.memoriaUsada,ll->dato.memoriaLibre);
            
            ll = ll->siguiente; 
        }
        
    }
}

int generarBloquesAleatorios(){
	
	return (rand() %(250 - 100 + 1)) + 100;
}

int calcularCantidadBloquesProceso(int solicitudMemoria){
	
	return (solicitudMemoria/TAMANIOBLOQUESEGMENTO)+1;
}

int solicitarMemoria(){
	return (rand() %(50 - 20 + 1)) + 20;
}

void llenarListaLigaSegmentos(){
	srand(time(NULL)); 
	
	int i = 0;
	while(i < TOTALSEGMENTOSLISTA){
		int id = 0;
		bool estado = false;
		int longitud = generarBloquesAleatorios();
		
		agregarAListaLigada(&lista,id,estado,longitud);
		i++;
		
	}
}

int contarCantidadBloquesReservadosLL(int id, listaLigada ll ){
	int total = 0;
	if(ll== NULL){ 
        printf("Sin bloques reservados.\n");
    }else{ 
    	
        while (ll!= NULL ) {
        	
        	if(ll->dato.id == id){
        		total++;
			}

            ll = ll->siguiente; 
        }
        
    }
    
    return total;
}

void buscarSegmentoListaLigada( int id, listaLigada ll, int solicitudMemoria){
	
	if(ll== NULL){ 
        printf("Sin bloques reservados.\n");
    }else{ 
    	
        while (ll!= NULL ) {
        	
        	if( ll->dato.estado == 0 && ll->dato.id == 0 && ll->dato.longitud > solicitudMemoria){
        		ll->dato.id = id;
        		ll->dato.estado = true;
        	
        		//ll->dato.longitud = solicitudMemoria;
        		
        		ll->dato.memoriaUsada = solicitudMemoria;
        		ll->dato.memoriaLibre = ll->dato.longitud - solicitudMemoria;
        		
        		
        		escribirEnArchivoDILL(ll->dato.memoriaLibre);
        		escribirEnArchivoDELL(calcularDesperdicioExternoLL(lista));
        		break;
			}
			
            ll = ll->siguiente; 
        }
        
    }
}

void removerProcesoListaLigada( int id, listaLigada ll){

	pthread_mutex_lock(&semaforo); 
	if(ll== NULL){ 
        printf("Sin bloques reservados.\n");
    }else{ 
    	
        while (ll != NULL ) {
        	

        	if(ll->dato.id  ==  id  ){
       	
        		ll->dato.id = 0;
        		ll->dato.memoriaUsada = 0;
        		ll->dato.memoriaLibre = 0;
        		ll->dato.estado = false;

			}

            ll = ll->siguiente; 
        }
        
    }
    pthread_mutex_unlock(&semaforo); 
}


void escribirEnArchivoDILL(int desperdicio){
	fp = fopen("desperdicioIListasLigadas.txt","a");
	fprintf(fp,"%d\n",desperdicio);
	fclose(fp);
}

void escribirEnArchivoDELL(int desperdicio){
	fp = fopen("desperdicioEListasLigadas.txt","a");
	fprintf(fp,"%d\n",desperdicio);
	fclose(fp);
}

void escribirEnArchivoPromedioEspera(int promedio){
	fp = fopen("promedioEsperaLL.txt","a");
	fprintf(fp,"%d\n",promedio);
	fclose(fp);
}

void escribirEnArchivoPromedioEsperaSocios(int promedio){
	fp = fopen("promedioEsperaSocios.txt","a");
	fprintf(fp,"%d\n",promedio);
	fclose(fp);
}

void escribirEnArchivoPromedioEsperaMapaBits(int promedio){
	fp = fopen("promedioEsperaMapaBits.txt","a");
	fprintf(fp,"%d\n",promedio);
	fclose(fp);
}

void escribirEnArchivoPromedioFinalizados(int cantidad){
	fp = fopen("promedioProcesosFinalizadosLL.txt","a");
	fprintf(fp,"%d\n",cantidad);
	fclose(fp);
}

void escribirEnArchivoPromedioFinalizadosSocios(int cantidad){
	fp = fopen("promedioProcesosFinalizadosSocios.txt","a");
	fprintf(fp,"%d\n",cantidad);
	fclose(fp);
}

void escribirEnArchivoPromedioFinalizadosMapaBits(int cantidad){
	fp = fopen("promedioProcesosFinalizadosMapaBits.txt","a");
	fprintf(fp,"%d\n",cantidad);
	fclose(fp);
}

void escribirEnArchivoDISocios(int cantidad){
	fp = fopen("promedioDInternoSocios.txt","a");
	fprintf(fp,"%d\n",cantidad);
	fclose(fp);
}

void limpiarFichero(){
		fp = fopen("desperdicioIListasLigadas.txt","w");
		fclose(fp);
		fp = fopen("desperdicioEListasLigadas.txt","w");
		fclose(fp);
		fp = fopen("promedioEsperaLL.txt","w");
		fclose(fp);
		fp = fopen("promedioProcesosFinalizadosLL.txt","w");
		fclose(fp);
		fp = fopen("desperdicioIMapaBits.txt","w");
		fclose(fp);
		fp = fopen("desperdicioEMapaBits.txt","w");
		fclose(fp);
		fp = fopen("promedioEsperaMapaBits.txt","w");
		fclose(fp);
		fp = fopen("promedioProcesosFinalizadosMapaBits.txt","w");
		fclose(fp);
	
		fp = fopen("desperdicioESocios.txt","w");
		fclose(fp);
		fp = fopen("promedioDInternoSocios.txt","w");
		fclose(fp);
		fp = fopen("promedioEsperaSocios.txt","w");
		fclose(fp);
		fp = fopen("promedioProcesosFinalizadosSocios.txt","w");
		fclose(fp);
	
}

int obtenerDesperdicioInternoLL(){
	int total = 0;
	int n = 0;
	fp = fopen("desperdicioIListasLigadas.txt","r");
	while(!feof(fp)){

		fscanf(fp,"%d",&n);

		total+=n;

	}
	return total;
}

int obtenerDesperdicioInternoMapaBits(){
	int total = 0;
	int n = 0;
	fp = fopen("desperdicioIMapaBits.txt","r");
	while(!feof(fp)){

		fscanf(fp,"%d",&n);

		total+=n;

	}
	return total;
}

int obtenerDesperdicioInternoSocios(){
	int total = 0;
	int n = 0;
	fp = fopen("promedioDInternoSocios.txt","r");
	while(!feof(fp)){

		fscanf(fp,"%d",&n);

		total+=n;

	}
	return total;
}

int obtenerPromedioProcesosFinalizadosMapaBits(){
	int total = 0;
	int n = 0;
	fp = fopen("promedioProcesosFinalizadosMapaBits.txt","r");
	while(!feof(fp)){

		fscanf(fp,"%d",&n);

		total+=n;

	}
	return total/cantidadProcesos;
}

int obtenerPromedioDesperdicioExternoLL(){
	int total = 0;
	int n = 0;
	fp = fopen("desperdicioEListasLigadas.txt","r");
	while(!feof(fp)){

		fscanf(fp,"%d",&n);

		total+=n;

	}
	return total;
}

void escribirEnArchivoDIM(int desperdicioInterno){
	fp = fopen("desperdicioIMapaBits.txt","a");
	fprintf(fp,"%d\n",desperdicioInterno);
	fclose(fp);
}

int obtenerPromedioDesperdicioExternoSocios(){
	int total = 0;
	int n = 0;
	fp = fopen("desperdicioESocios.txt","r");
	while(!feof(fp)){

		fscanf(fp,"%d",&n);

		total+=n;

	}
	return total/63;
}

int obtenerPromedioDesperdicioExternoMapaBits(){
	int total = 0;
	int n = 0;
	fp = fopen("desperdicioEMapaBits.txt","r");
	while(!feof(fp)){

		fscanf(fp,"%d",&n);

		total+=n;

	}
	return total;
}

int obtenerPromedioTiempoEspera(){
	int total = 0;
	int n = 0;
	fp = fopen("promedioEsperaLL.txt","r");
	while(!feof(fp)){

		fscanf(fp,"%d",&n);

		total+=n;

	}
	return total/cantidadProcesos;
}

int obtenerPromedioTiempoEsperaMapaBits(){
	int total = 0;
	int n = 0;
	fp = fopen("promedioEsperaMapaBits.txt","r");
	while(!feof(fp)){

		fscanf(fp,"%d",&n);

		total+=n;

	}
	return total/cantidadProcesos;
}

int obtenerPromedioTiempoEsperaSocios(){
	int total = 0;
	int n = 0;
	fp = fopen("promedioEsperaSocios.txt","r");
	while(!feof(fp)){

		fscanf(fp,"%d",&n);

		total+=n;

	}
	return total/cantidadProcesos;
}

int obtenerPromedioProcesosFinalizados(){
	int total = 0;
	int n = 0;
	fp = fopen("promedioProcesosFinalizadosLL.txt","r");
	while(!feof(fp)){

		fscanf(fp,"%d",&n);

		total+=n;

	}
	return total/cantidadProcesos;
}

int obtenerPromedioProcesosFinalizadosSocios(){
	int total = 0;
	int n = 0;
	fp = fopen("promedioProcesosFinalizadosSocios.txt","r");
	while(!feof(fp)){

		fscanf(fp,"%d",&n);

		total+=n;

	}
	return total/cantidadProcesos;
}

int calcularDesperdicioExternoLL(listaLigada ll){
	int total = 0;
	if(ll== NULL){ 
        printf("Lista vacia.\n");
    }else{ 
    	
        while (ll != NULL ) {
        	

        	if(!ll->dato.estado  ){
       	
        		total+=ll->dato.longitud;

			}

            ll = ll->siguiente; 
        }
        
    }
    
    return total;
}

int calcularPromedioEspera(cola c){
	int total = 0;
	int promedio = 0;
	if(c== NULL){ 
        printf("Lista vacia.\n");
    }else{ 
    	
        while (c != NULL ) {
        	
			total += c->dato.tiempoEspera;

            c = c->siguiente; 
        }
        
    }
    return total/cantidadProcesos;
}

void limpiarColas(){
	colaS = NULL;
	colaL = NULL;
	colaES = NULL;

}

void mostrarEstadisticasListaLigada(){
	printf("-----------------------------------------------------------------------\n");
	printf("\nListas ligadas\n");
	printf("%-15s%-15s%-15s%-15s%-15s%-15s%\n", "D.interno", "D. externo", "C.P.Ejecucion", "P.Finalizados", "P.Ejecucion","P.Tiempo espera");
	printf("%-15d%-15d%-15d%-15d%-15d%-15d%\n",obtenerDesperdicioInternoLL(), obtenerPromedioDesperdicioExternoLL() ,totalProcesosTerminadosLL, obtenerPromedioProcesosFinalizados() , tiempoPromedioEjecucionLL,obtenerPromedioTiempoEspera());
	printf("-----------------------------------------------------------------------\n");
}

void mostrarEstadisticasMapaBits(){
	printf("-----------------------------------------------------------------------\n");
	printf("\nMapa de bits\n");
	printf("%-15s%-15s%-15s%-15s%-15s%-15s%\n", "D.interno", "D. externo", "C.P.Ejecucion", "P.Finalizados", "P.Ejecucion","P.Tiempo espera");
	printf("%-15d%-15d%-15d%-15d%-15d%-15d%\n",obtenerDesperdicioInternoMapaBits(), obtenerPromedioDesperdicioExternoMapaBits() ,totalProcesosTerminadosMB, obtenerPromedioProcesosFinalizadosMapaBits() , tiempoPromedioEjecucionMB,obtenerPromedioTiempoEsperaMapaBits());
	printf("-----------------------------------------------------------------------\n");
}

void mostrarEstadisticasSocios(){
	printf("-----------------------------------------------------------------------\n");
	printf("\nSocios\n");
	printf("%-15s%-15s%-15s%-15s%-15s%-15s%\n", "D.interno", "D. externo", "C.P.Ejecucion", "P.Finalizados", "P.Ejecucion","P.Tiempo espera");
	printf("%-15d%-15d%-15d%-15d%-15d%-15d%\n",obtenerDesperdicioInternoSocios(), obtenerPromedioDesperdicioExternoSocios() ,totalProcesosTerminadosSocios, obtenerPromedioProcesosFinalizadosSocios() , tiempoPromedioEjecucionSocios,obtenerPromedioTiempoEsperaSocios());
	printf("-----------------------------------------------------------------------\n");
}

int calcularPromedioTiempoEjecucion(cola c){
	int total = 0;
	int promedio = 0;
	if(c== NULL){ 
        printf("Cola vacia.\n");
    }else{ 
    	
        while (c != NULL ) {
        	
			total += c->dato.rafaga;

            c = c->siguiente; 
        }
        
    }
    
    return total/cantidadProcesos;
}

void crearArbolSocios(){
	raiz = crearNodo(4096,0);
	
		//nivel 1
	insertarIzquierda(raiz,2048,0);
	insertarDerecha(raiz,2048,0);
	
	//nivel 2
	insertarIzquierda(raiz->izquierda,1024,0);
	insertarDerecha(raiz->izquierda,1024,0);
	
	insertarIzquierda(raiz->derecha,1024,0);
	insertarDerecha(raiz->derecha,1024,0);
	
	//nivel 3
	insertarIzquierda(raiz->izquierda->izquierda,512,0);
	insertarDerecha(raiz->izquierda->izquierda,512,0);
	
	insertarIzquierda(raiz->izquierda->derecha,512,0);
	insertarDerecha(raiz->izquierda->derecha,512,0);
	
	insertarIzquierda(raiz->derecha->derecha,512,0);
	insertarDerecha(raiz->derecha->derecha,512,0);
	
	insertarIzquierda(raiz->derecha->izquierda,512,0);
	insertarDerecha(raiz->derecha->izquierda,512,0);
	
	insertarIzquierda(raiz->izquierda->izquierda->izquierda,256,0);
	insertarDerecha(raiz->izquierda->izquierda->izquierda,256,0);
	
	insertarIzquierda(raiz->izquierda->izquierda->derecha,256,0);
	insertarDerecha(raiz->izquierda->izquierda->derecha,256,0);
	
	insertarIzquierda(raiz->izquierda->derecha->izquierda,256,0);
	insertarDerecha(raiz->izquierda->derecha->izquierda,256,0);
	
	insertarIzquierda(raiz->izquierda->derecha->derecha,256,0);
	insertarDerecha(raiz->izquierda->derecha->derecha,256,0);
	
	insertarIzquierda(raiz->derecha->derecha->izquierda,256,0);
	insertarDerecha(raiz->derecha->derecha->izquierda,256,0);
	
	insertarIzquierda(raiz->derecha->derecha->derecha,256,0);
	insertarDerecha(raiz->derecha->derecha->derecha,256,0);
	
	insertarIzquierda(raiz->derecha->izquierda->izquierda,256,0);
	insertarDerecha(raiz->derecha->izquierda->izquierda,256,0);
	
	insertarIzquierda(raiz->derecha->izquierda->derecha,256,0);
	insertarDerecha(raiz->derecha->izquierda->derecha,256,0);
}



void asignarMemoriaSocios(struct Socio* raiz, int id, int solicitud, int redondeo) {
  if (raiz == NULL){
  	return;
  } 
  if(contadorSocios == 0 && raiz->id_Proceso !=id && raiz->tam == redondeo && raiz->estado == false ){
  	raiz->id_Proceso = id;
	  	 raiz->estado = true;
	  	 raiz->solicitudMemoria = solicitud;
	  	 escribirEnArchivoDISocios(raiz->tam - solicitud);
	  	 escribirEnArchivoDESocios(desperdicioExternoSocios);
	  	 contadorSocios = 1;
  	
  }
  
  asignarMemoriaSocios(raiz->izquierda,id,solicitud,redondeo);
  	asignarMemoriaSocios(raiz->derecha,id,solicitud,redondeo);
  
  
  
  
}

void eliminarProcesoSocios(struct Socio* raiz, int id) {
  if (raiz == NULL){
  	return;
  } 
  
  if(raiz->id_Proceso == id){
  	 raiz->estado = false;
  	 raiz->id_Proceso = 0;
  	 raiz->solicitudMemoria = 0;
  }
  //printf("%d ->", root->item);
 eliminarProcesoSocios(raiz->izquierda,id);
  eliminarProcesoSocios(raiz->derecha,id);
}

int buscarNumeroPotencia(int num){
	int potencia = 0;
	int exponente = 0;
	bool estado = true;
	while(estado){
		if(potencia > num){
			break;
		}
		
		potencia = pow (2, exponente);
		exponente++;
	}
}

struct Socio* crearNodo(int tamanio, int procesoid) {
  struct Socio* nuevo = malloc(sizeof(struct Socio));
  nuevo->id_Proceso = procesoid;
  nuevo->estado = false;
  nuevo->tam = tamanio;
  
  nuevo->izquierda = NULL;
  nuevo->derecha = NULL;

  return nuevo;
}

struct Socio* insertarIzquierda(struct Socio* raiz, int tam, int procesoid) {
  raiz->izquierda =  crearNodo(tam,procesoid);
  return raiz->izquierda;
}


struct Socio* insertarDerecha(struct Socio* raiz, int tam, int procesoid) {
  raiz->derecha = crearNodo(tam,procesoid);
  return raiz->derecha;
}

void recorrerArbolSociosPreOrden(struct Socio* root) {
  if (root == NULL) return;
  
  printf("%-15d%-15d%-15d%-15d%\n", root->id_Proceso,  root->estado, root->solicitudMemoria,root->tam);
  
  recorrerArbolSociosPreOrden(root->izquierda);
  recorrerArbolSociosPreOrden(root->derecha);
}

void verificarBloquesLibresSocios(struct Socio* root) {
  if (root == NULL) return;
  if(root->estado == true){
  	 contarBloquesLibresArbol++;
  }
  verificarBloquesLibresSocios(root->izquierda);
  verificarBloquesLibresSocios(root->derecha);
}


void agregarProcesoMemoriaVirtual(memoriaVirtual *mv,int id,int cantMemoria){
	memoriaVirtual anterior, actual,nuevo; 
	struct BloqueVirtual nuevoB;
    
    nuevoB.id = id;
    nuevoB.totalMemoriaReservada = cantMemoria;
    nuevoB.estado = true;
    
    nuevo = malloc(sizeof(COLA)); 
    if(nuevo != NULL) { 
       
		nuevo->dato = nuevoB; 
        nuevo->siguiente = NULL;
        
        
        anterior = NULL;
        actual = *mv; 
        while(actual != NULL ){ 
		
            anterior = actual;
            actual = actual->siguiente;
        }
        if (anterior == NULL) { 
            nuevo->siguiente = *mv; 
            *mv = nuevo; 
        }else{ 
            
            
			anterior->siguiente = nuevo; 
            nuevo->siguiente = actual; 
        }
    }else{
        printf("Error al reservar memoria\n");
    }
	
}



void eliminarProcesoMemoriaVirtual(memoriaVirtual *mv,int id){
    
    struct NodoMemoriaVirtual *temp = *mv, *prev;
 
    
    if (temp != NULL && temp->dato.id == id) {
        *mv = temp->siguiente; 
        free(temp); 
        return;
    }
 
    
    while (temp != NULL && temp->dato.id != id) {
        prev = temp;
        temp = temp->siguiente;
    }
 
    
    if (temp == NULL)
        return;
 
    
    prev->siguiente = temp->siguiente;
 
    free(temp); 
    
}

void mostrarMemoriaVirtual(memoriaVirtual mv){

	if(mv == NULL){ 
        printf("Memoria vacia.\n");
    }else{ 
    	printf("Memoria virtual\n");
    	printf("%-15s%-15s%\n", "PID", "Memoria reservada");
        while (mv != NULL ) {
        	printf("%-15d%-15d%\n", mv->dato.id , mv->dato.totalMemoriaReservada);
            mv = mv->siguiente; 
        }
        
    }
    
    
}

bool contarCantidadBloquesLibresLL(int id, int solicitud, listaLigada ll ){
	int total = 0;
	bool verificar = false;
	if(ll== NULL){ 
        printf("Sin bloques reservados.\n");
    }else{ 
    	
        while (ll!= NULL ) {
        	
        	if(!ll->dato.estado){
        		total += ll->dato.longitud;
			}

            ll = ll->siguiente; 
        }
        
    }
    
    if(total > solicitud ){
    	verificar = true;
	}
    
    return verificar;
}

bool contarCantidadBloquesLibresMapaBits(int solicitud){
	int total = 0;
	bool verificar = false;
	int i = 0;
	
	for(i ; i < TAMANIOBLOQUEARRAY;i++){
		
		if(arrayBits[i].estado == false){
			total+=64;
		}
	}
    
    if(total > solicitud ){
    	verificar = true;
	}
    
    return verificar;
}


void llenarMapaBits(){
	int i = 0;
	for(i ; i < TAMANIOBLOQUEARRAY;i++){
		arrayBits[i].id = 0;
		arrayBits[i].estado = false;
		arrayBits[i].tamBloque = 64;
	}
	
}

void mostrarMapaBits(){
	int i = 0;
	
	printf("Modelo: Mapa de bits\n");
    printf("%-15s%-15s%-15s%\n", "PID", "Estado", "Memoria usada");
       
	for(i ; i < TAMANIOBLOQUEARRAY;i++){
		printf("%-15d%-15d%-15d%\n", arrayBits[i].id,arrayBits[i].estado,arrayBits[i].memoriaUsada);
		
	}
}

int calcularCantBloques(int SM){
	int CB;
	CB = (SM/TAMANIOBLOQUESEGMENTO)+1;
	return CB;
}

int calcularDesperdicioInterno(int SM, int CB){
	int DI;
	DI = (CB/TAMANIOBLOQUESEGMENTO)+SM;
	return DI;
}

void asignarProcesoMapaBits(int idProceso, int SM){
	int cont = 0;
	int i = 0;
	int CB = calcularCantBloques(SM);
	for(i=0; i< 30;i++){
		if(arrayBits[i].estado == false){
			arrayBits[i].id = idProceso;
			arrayBits[i].estado = true;
			arrayBits[i].memoriaUsada = SM;
			arrayBits[i].memoriaLibre = (CB*TAMANIOBLOQUESEGMENTO) - SM;
			cont++;
			if(cont == CB){
				escribirEnArchivoDIM(calcularDesperdicioInterno(SM,CB));
				escribirEnArchivoDEM(calcularDesperdicioExternoMapaBits());
				break;
			}
		}
	}
}

void eliminarProcesosDelMapa( int idProceso){
	int i = 0;
	for(i=0; i< TAMANIOBLOQUEARRAY;i++){
		if(arrayBits[i].id == idProceso){
			arrayBits[i].estado = false;
			arrayBits[i].id = 0;
		}

	}
}


int main(){
	llenarMapaBits();
	crearArbolSocios();
	llenarListaLigaSegmentos();
   	limpiarFichero();
   	
	//GENERA HILOS ALEATORIOS DE 8 - 20
	srand(time(NULL)); 
	cantidadProcesos = (rand() %(25 - 10 + 1)) + 10;
	printf("Cantidad procesos creados: %d\n", cantidadProcesos);
	printf("\n");
	
	//CREAR LOS PROCESOS Y AGREGARLOS A LA COLA DE NUEVOS
	crearColaNuevos(&colaAuxiliar,cantidadProcesos);

	printf("\n");
	
	//TOMAR PROCESOS DE LA COLA DE NUEVOS Y PASARLOS A
	//COLA DE SOLICITUDES CON FCFS
	seleccionarProcesosColaNuevos(&colaAuxiliar, &colaS, cantidadProcesos);
	printf("Cola de solicitudes\n");
	mostrarColas(colaS);
	printf("\n");
	tiempoPromedioEjecucionLL = calcularPromedioTiempoEjecucion(colaS);
	
	
	//TOMAR PROCESOS DE LA COLA DE SOLICITUDES Y PASARLOS
	//A LA COLA DE LISTOS CON SJF
	seleccionarListos = (rand() %(7 - 3 + 1)) + 3;
	seleccionarProcesosColaSolicitud(&colaS, &colaL, 5);
	printf("Cola de listos\n");
	mostrarColas(colaL);
	printf("\n");
	
    procesos = (pthread_t*)malloc(sizeof(pthread_t)*cantidadProcesos); 
	pthread_create(&(administrador), NULL, &comenzarEjecucion, NULL);
    pthread_join(administrador, NULL);

	return 0;
}
