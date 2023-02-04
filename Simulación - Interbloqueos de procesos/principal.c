#include <pthread.h>
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <time.h>
#include <stdbool.h>
#include <math.h>

#include "estructuras.h"
#include "prototipos.h"

/*--------------------------------*/



/*FUNCIONES PARA HILOS*/
void* test(){
	pthread_mutex_lock(&semaforo);

	printf("\n");
	/*CON EL ALGORITMO DEL BANQUERO VERIFICA SI
	SE CUMPLE QUE LA SOLICITUD DE RECURSOS SEA
	MENOR QUE LOS RECURSOS DISPONIBLES Y SI
	LA SOLICITUD NO HA SIDO ACEPTADA */
	
    if(compararValoresMatricesNR(solicitudContador) == 1 && finalizados[solicitudContador] == false && temporal->dato.asignado == false ){
    	/*SE ACEPTA LA SOLICITUD */
		printf("Solicitud %d aceptada \n",solicitudContador+1);
    	/*SE TOMAN LA CANTIDAD DE RECURSOS NECESARIOS PARA ESTA SOLICITUD */
    	
    	if(temporal->dato.rollback == true){
    		restaurarEstadoRollback(solicitudContador,temporal->dato.numeroPlaca);
		}
    	int cantidadMecanicos = matrizRestantes[solicitudContador][0];
    	int cantidadMaquinas = matrizRestantes[solicitudContador][1];
    	int cantidadHerramientas =  matrizRestantes[solicitudContador][2];
    	
    	
		printf("Recursos solicitados: [%d,%d,%d]\n",abs(cantidadMecanicos),abs(cantidadMaquinas), abs(cantidadHerramientas));
		/*SE ASIGNAN LOS TOTALES A LA SOLICITUD */
    	temporal->dato.totalMecanicosAsignados = cantidadMecanicos;
    	temporal->dato.totalMaquinasAsignadas = cantidadMaquinas;
    	temporal->dato.totalHerramientasAsignadas = cantidadHerramientas;
    	   	
   		/*SE TOMAN ID'S PARA TIPOS DE RECURSOS Y SE GUARDAN EN UN VECTOR DE ENTEROS */
		int *p = elegirSolicitudMecanicosTipo(temporal->dato.totalMecanicosAsignados);
		asignarSolicitudAMecanicos(p,temporal->dato.totalMecanicosAsignados,temporal->dato.numeroPlaca); 
		
		
		
		int *p2 = elegirSolicitudMaquinaTipo(temporal->dato.totalMaquinasAsignadas);
		asignarSolicitudAMaquinas(p2,temporal->dato.totalMaquinasAsignadas,temporal->dato.numeroPlaca);
		
		int *p3 = elegirSolicitudHerramientaTipo(temporal->dato.totalHerramientasAsignadas);
		asignarSolicitudAHerramientas(p3,temporal->dato.totalHerramientasAsignadas,temporal->dato.numeroPlaca);
		
		temporal->dato.asignado = true;
		temporal->dato.totalTiempo = resetearTiempo(temporal->dato.numeroPlaca);
//		guardarEstadoSolicitud(solicitudContador,temporal->dato.numeroPlaca,cantidadMecanicos, cantidadMaquinas,cantidadHerramientas);
		/*SE VUELVE AGREGAR A LA COLA DE LISTOS AL FINAL*/
		insertarAlFinal(temporal->dato.id,temporal->dato.numeroPlaca,temporal->dato.totalTiempo,temporal->dato.asignado,temporal->dato.totalMecanicosAsignados,false,temporal->dato.totalMaquinasAsignadas,temporal->dato.totalHerramientasAsignadas,temporal->dato.iteraciones);
		

		/*SE REMUEVE DE LA ATENCIÓN*/
		desapilarDeColaListoSolicitud(&temporal,temporal->dato.numeroPlaca);
		
		/*SE ACTUALIZAN LAS MATRICES DE ASIGNACIÓN, LOS RECURSOS DISPONIBLES Y 
		LA MATRIZ DE RECURSOS NECESARIOS*/
		
		sumarValoresMatrizAsignados(solicitudContador);
		restarDisponibles(solicitudContador);
		actualizarMatrizNecesarios(solicitudContador);
		printf("Matriz de recursos necesarios\n");
		verMatrizNecesarios();
		printf("\n");
	//	verRecursosDisponibles();
		
	}else{
	
		/*SE VERIFICA QUE EL TIEMPO DE LA SOLICITUD HAYA TERMINADO*/
		if(verificarSolicitudTerminado(solicitudContador) &&   temporal->dato.totalTiempo  == 0  && finalizados[solicitudContador] == false ){
			
			printf("Solicitud %d terminada con exito\n",temporal->dato.numeroPlaca);
			desocuparMecanico(temporal->dato.numeroPlaca);
			desocuparMaquina(temporal->dato.numeroPlaca);
			desocuparHerramienta(temporal->dato.numeroPlaca);
			/*DEVUELVE LOS RECURSOS QUE USÓ*/
			devolverRecursos(solicitudContador);
			/*SE MARCA COMO FINALIZADO*/
			finalizados[solicitudContador] = true;
			temporal->dato.finalizado = true;
			temporal->dato.asignado = false;
			//verMecanicos();
			verRecursosDisponibles();
			insertarAlFinal(temporal->dato.id,temporal->dato.numeroPlaca,temporal->dato.totalTiempo,temporal->dato.asignado,temporal->dato.totalMecanicosAsignados,true,temporal->dato.totalMaquinasAsignadas,temporal->dato.totalHerramientasAsignadas,temporal->dato.iteraciones);
			desapilarDeColaListoSolicitud(&temporal,temporal->dato.numeroPlaca);
			
			
		}else if(temporal->dato.asignado == true ){
			/*SI ESTA ASIGNADO SE MUESTRA INFORMACIÓN GENERAL DE LA SOLICITUD*/
		
			printf("\n---------------------------------------------------\n");
			printf("Solicitud #%d CL%d en progreso: %d min\n",solicitudContador,temporal->dato.numeroPlaca,temporal->dato.totalTiempo);
			printf("Recursos solicitados: [%d,%d,%d]\n",temporal->dato.totalMecanicosAsignados,temporal->dato.totalMaquinasAsignadas,temporal->dato.totalHerramientasAsignadas);
			printf("\n");
			printf("Mecanicos\n");
			detallarMecanicosSolicitud(temporal->dato.numeroPlaca);
			printf("\n");
			printf("Maquinas\n");
			detallarMaquinasSolicitud(temporal->dato.numeroPlaca);
			printf("\n");
			printf("Herramientas\n");
			detallarHerramientasSolicitud(temporal->dato.numeroPlaca);
			printf("\n---------------------------------------------------\n");
			
			/*SE APLICA ELIMINACION DE LA SOLICITUD SI SUPERA LAS 50 ITERACIONES
			PARA LIBERAR RECURSOS Y SEAN USADOS POR OTRA SOLICITUD */
			if(verificarIteracionesSolicitud(temporal->dato.iteraciones)){
				
				int recuperacion = (rand() %(2 - 1 + 1)) + 1;
				
				switch(recuperacion){
					case 1:{
						printf("Aplicando rollback.....\n");
						guardarEstadoSolicitud(solicitudContador,temporal->dato.numeroPlaca,temporal->dato.totalMecanicosAsignados, temporal->dato.totalMaquinasAsignadas,temporal->dato.totalHerramientasAsignadas);
						desocuparMecanico(temporal->dato.numeroPlaca);
						desocuparMaquina(temporal->dato.numeroPlaca);
						desocuparHerramienta(temporal->dato.numeroPlaca);
						devolverRecursos(solicitudContador);
						restaurarRecursosMatrizNecesariosRollback(solicitudContador,temporal->dato.totalMecanicosAsignados, temporal->dato.totalMaquinasAsignadas,temporal->dato.totalHerramientasAsignadas);
						finalizados[solicitudContador] = false;
						temporal->dato.finalizado = false;
						temporal->dato.asignado = false;
						temporal->dato.iteraciones = 0;
						temporal->dato.rollback = true;
						break;
					}
					
					case 2:{
						printf("Aplicando eliminación de solicitud.....\n");
						desocuparMecanico(temporal->dato.numeroPlaca);
						desocuparMaquina(temporal->dato.numeroPlaca);
						desocuparHerramienta(temporal->dato.numeroPlaca);
						devolverRecursos(solicitudContador);
						restaurarRecursosMatrizNecesarios(solicitudContador);
						finalizados[solicitudContador] = false;
						temporal->dato.finalizado = false;
						temporal->dato.asignado = false;
						temporal->dato.iteraciones = 0;
						break;
					}
				}
			
			}
			temporal->dato.iteraciones= temporal->dato.iteraciones+1;
			insertarAlFinal(temporal->dato.id,temporal->dato.numeroPlaca,temporal->dato.totalTiempo,temporal->dato.asignado,temporal->dato.totalMecanicosAsignados,false,temporal->dato.totalMaquinasAsignadas,temporal->dato.totalHerramientasAsignadas,temporal->dato.iteraciones);
			desapilarDeColaListoSolicitud(&temporal,temporal->dato.numeroPlaca);
				

		}else{
			//SI ESTA EN ESPERA Y NO CUMPLE LAS CONDICIONES
			//PASA AL FINAL
			if(finalizados[solicitudContador] == true){
				printf("Solicitud %d finalizada\n",temporal->dato.numeroPlaca);
			}else{
				printf("Solicitud %d de reparacion en espera\n",temporal->dato.numeroPlaca);
				
			}
				insertarAlFinal(temporal->dato.id,temporal->dato.numeroPlaca,temporal->dato.totalTiempo,temporal->dato.asignado,temporal->dato.totalMecanicosAsignados,false,temporal->dato.totalMaquinasAsignadas,temporal->dato.totalHerramientasAsignadas,temporal->dato.iteraciones);
				desapilarDeColaListoSolicitud(&temporal,temporal->dato.numeroPlaca);
			
			
		}
		
	}
	
	
	pthread_mutex_unlock(&semaforo);
	sleep(0);
}

void* comenzarEjecucion(void *arg){
	srand(time(NULL)); 
		
	while(banderaEjecucion){
       
       if(!verificarFinalizacionSolicitudes()){
       		seleccionarSolicitudListo(&colaListos,&temporal,1);
       	//	printf("Iteracion %d: %d\n",solicitudContador,temporal->dato.iteraciones);
       		if (pthread_create(&(hiloSolicitudes[contadorEjecucion]), NULL, &test, NULL)!=0){ 
	            printf("Error al crear hilos\n");
	        }
	        
	        if(temporal->dato.totalTiempo > 0){
				reducirTiempoMecanico(temporal->dato.numeroPlaca);
				temporal->dato.totalTiempo = resetearTiempo(temporal->dato.numeroPlaca);
			}else{
				temporal->dato.totalTiempo = 0;
			}
	        
	        pthread_join(hiloSolicitudes[contadorEjecucion], NULL); 
	        contadorEjecucion++;
	        solicitudContador++;
	        
	        if(contadorEjecucion==cantidadSolicitudes){ 
	            contadorEjecucion=0;
	            solicitudContador=0;
	        }
	   }else{
	   		banderaEjecucion = false;
	   		printf("\nSolicitudes atendidas con exito.\n");
	   		verRecursosDisponibles();
	   }
       	
       	
	
	        
	        //sleep(4);
   	}
	
}

/*-------------------------------------------------------------*/



/*ESTRUCTURAS PARA LOS RECURSOS*/
bool verificarCola(solicitudesListas c){
	if(c == NULL){
		return false;
	}
	
	return true;
}
void insertarAlFinal(int id, int numeroPlaca,int totalTiempo, bool estado, int totalMecanicos, bool finalizado, int totalMaq, int totalHer, int ite){
 	struct NodoListo* temporal = (struct NodoListo*) malloc(sizeof(struct NodoListo));
 	temporal->dato.id = id;
 	temporal->dato.numeroPlaca = numeroPlaca;
 	temporal->dato.totalTiempo = totalTiempo;
 	temporal->dato.asignado = estado;
 	temporal->dato.totalMecanicosAsignados = totalMecanicos;
 	temporal->dato.totalMaquinasAsignadas = totalMaq;
 	temporal->dato.totalHerramientasAsignadas = totalHer;
// 	temporal->dato.listaMecanicos = listaMecanicos;
// 	temporal->dato.listaMaquinas = listaMaquinas;
// 	temporal->dato.listaHerramientas = listaHerr;
 	temporal->dato.finalizado = finalizado;
 	temporal->dato.iteraciones = ite;
 	temporal->siguiente = NULL;
 	
 	if(colaListos==NULL){
 		colaListos = temporal;
	 }
	struct NodoListo* ultimo = colaListos;
	while(ultimo->siguiente != NULL){
	
		ultimo = ultimo->siguiente;
	}
	
	ultimo->siguiente = temporal;

}

bool verificarIteracionesSolicitud(int iteraciones){
	if(iteraciones > 25){
		return true;
	}
	return false;
}


int id = 0;

void crearColaSolicitudes(solicitudes *colaAux, int cantidadProcesos){
	srand(time(NULL)); 
	
	int i = 0;
	
	while(i < cantidadProcesos){
		
		int placa = (rand() %(999999 - 100000 + 1)) + 100000;
		agregarNuevaSolicitud(colaAux,id,placa);
		i++;
		id--;
	}
}

void seleccionarSolicitudesCola(solicitudes *cs, solicitudesListas *cl, int totalSolicitudes){
	int total = 0;
	while(total < totalSolicitudes && ((*cs)!=NULL)){
		obtenerColaSolicitud(cs,cl);
		total++;		
	}
}

void seleccionarSolicitudListo(solicitudesListas *cl, solicitudesListas *t, int totalSolicitudes){
	int total = 0;
	while(total < totalSolicitudes && ((*cl)!=NULL)){
		obtenerSolicitudListoAuxiliar(cl,t);
		total++;		
	}
}

void obtenerSolicitudListoAuxiliar(solicitudesListas *cn, solicitudesListas *cs){
	agregarSolicitudALista(cs,(*cn)->dato.id,(*cn)->dato.numeroPlaca,(*cn)->dato.totalTiempo,(*cn)->dato.asignado,(*cn)->dato.totalMecanicosAsignados,(*cn)->dato.listaMecanicos,(*cn)->dato.finalizado,(*cn)->dato.listaMaquinas,(*cn)->dato.listaHerramientas,(*cn)->dato.totalMaquinasAsignadas,(*cn)->dato.totalHerramientasAsignadas,(*cn)->dato.iteraciones);
	desapilarDeColaListoSolicitud(cn,(*cn)->dato.numeroPlaca);
}

void obtenerColaSolicitud(solicitudes *cn, solicitudesListas *cs){
	agregarSolicitudALista(cs,(*cn)->dato.id,(*cn)->dato.numeroPlaca,(*cn)->dato.totalTiempo,(*cn)->dato.asignado,(*cn)->dato.totalMecanicosAsignados,(*cn)->dato.listaMecanicos,(*cn)->dato.finalizado,(*cn)->dato.listaMaquinas,(*cn)->dato.listaHerramientas,(*cn)->dato.totalMaquinasAsignadas,(*cn)->dato.totalHerramientasAsignadas,(*cn)->dato.iteraciones);
	desapilarDeColaSolicitud(cn,(*cn)->dato.numeroPlaca);
}

void desapilarDeColaSolicitud(solicitudes *colaAux,int numeroPlaca){
    solicitudes temporal; 
    if(numeroPlaca== (*colaAux)->dato.numeroPlaca ){ 
        temporal = (*colaAux);
        *colaAux = (*colaAux)->siguiente; 
        free(temporal); 
        temporal = NULL;
    }
}

void desapilarDeColaListoSolicitud(solicitudesListas *colaAux,int numeroPlaca){
    solicitudesListas temporal; 
    if(numeroPlaca== (*colaAux)->dato.numeroPlaca ){ 
        temporal = (*colaAux);
        *colaAux = (*colaAux)->siguiente; 
        free(temporal); 
        temporal = NULL;
    }
}



void agregarNuevaSolicitud(solicitudes *colaS, int id, int numeroPlaca){
    solicitudes nuevoNodo, actualNodo; 
    struct Solicitud nuevaSolicitud;
    nuevaSolicitud.id = id;
    nuevaSolicitud.numeroPlaca = numeroPlaca;
    nuevaSolicitud.totalTiempo = 0;
    nuevaSolicitud.asignado = false;
    nuevaSolicitud.totalMecanicosAsignados = 0;
    nuevaSolicitud.totalMecanicosAsignados = 0;
    nuevaSolicitud.totalHerramientasAsignadas = 0;
    nuevaSolicitud.iteraciones = 0;
    nuevaSolicitud.finalizado = false;
  
    nuevoNodo = malloc(sizeof(COLASOLICITUD)); 
    if(nuevoNodo != NULL) { 
    	
        nuevoNodo->dato = nuevaSolicitud;
        nuevoNodo->siguiente = NULL;
        
        actualNodo = *colaS;
        nuevoNodo->siguiente = *colaS;
        *colaS = nuevoNodo;
    }else{
        printf("Solicitud no insertada, sin memoria disponible.\n");
    }
}

void agregarSolicitudALista(solicitudesListas *colaS, int id, int numeroPlaca, int tiempo, bool estado,int totalMec, int *listaMec,bool finalizado,int *listaMaq, int *listHerra, int totalMaq, int totalHerr,int ite){
    //solicitudesListas nuevoNodo, actualNodo; 
    solicitudesListas anterior, actual,nuevo; 
    struct Solicitud nuevaSolicitud;
    nuevaSolicitud.id = id;
    nuevaSolicitud.numeroPlaca = numeroPlaca;
    nuevaSolicitud.totalTiempo = tiempo;
    nuevaSolicitud.asignado = estado;
    nuevaSolicitud.totalMecanicosAsignados = totalMec;
    nuevaSolicitud.totalMaquinasAsignadas = totalMaq;
    nuevaSolicitud.totalHerramientasAsignadas = totalHerr;
    nuevaSolicitud.listaMecanicos = listaMec;
    nuevaSolicitud.listaMaquinas = listaMaq;
    nuevaSolicitud.listaHerramientas = listHerra;
    nuevaSolicitud.finalizado = finalizado;
    nuevaSolicitud.iteraciones = ite;
    
    nuevo = malloc(sizeof(COLALISTO)); 
    if(nuevo != NULL) { 
       
		nuevo->dato = nuevaSolicitud; 
        nuevo->siguiente = NULL;
        
        
        anterior = NULL;
        actual = *colaS; 
        while(actual != NULL){ 
		
            anterior = actual;
            actual = actual->siguiente;
        }
        if (anterior == NULL) { 
            nuevo->siguiente = *colaS; 
            *colaS = nuevo; 
        }else{ 
            
            
			anterior->siguiente = nuevo; 
            nuevo->siguiente = actual; 
        }
    }else{
        printf("Error al reservar memoria\n");
    }
    
}


void mostrarColaSolicitud(solicitudes c){
    
   
    if(c== NULL){ 
        printf("Cola sin solicitudes disponibles.\n");
    }else{ 
    	printf("%-15s%-15s\n", "Numero placa","ID");
        while (c!= NULL ) {
        	printf("%-15d%-15d%\n", c->dato.numeroPlaca,c->dato.id);	
            
            c = c->siguiente; 
        }
        
    }
  
}

void mostrarColaListos(solicitudesListas c){
    
   
    if(c== NULL){ 
        printf("Cola sin solicitudes disponibles.\n");
    }else{ 
    	printf("%-15s\n", "Numero placa");
        while (c!= NULL ) {
        	printf("%-15d%\n", c->dato.numeroPlaca);	
            
            c = c->siguiente; 
        }
        
    }
  
}



void crearMecanicos(){
	srand(time(NULL)); 
	int i;
	int id = 0;
	struct Mecanico aux;
	for(i = 0 ; i <= 17; i++){
		if( i >= 0 && i <= 1){
			mecanicos[i].id = id;
			mecanicos[i].estado = false;
			mecanicos[i].tipo= ELECTRICISTA;
			mecanicos[i].tiempo = 0;
			mecanicos[i].idSolicitud = 99;
					
		}
		if( i >= 2 && i <= 4){
			mecanicos[i].id = id;
			mecanicos[i].estado = false;
			mecanicos[i].tipo = PINTOR;
			mecanicos[i].tiempo = 0;
			mecanicos[i].idSolicitud = 99;
			
		}
		if( i >= 5 && i <= 6){
			mecanicos[i].id = id;
			mecanicos[i].estado = false;
			mecanicos[i].tipo = MOTOR;
			mecanicos[i].tiempo = 0;
			mecanicos[i].idSolicitud = 99;	
		}
		if( i >= 7 && i <= 8){
			mecanicos[i].id = id;
			mecanicos[i].estado = false;
			mecanicos[i].tipo = CAJA;
			mecanicos[i].tiempo = 0;
			mecanicos[i].idSolicitud = 99;
		}
		if( i >= 9 && i <= 12){
			mecanicos[i].id = id;
			mecanicos[i].estado = false;
			mecanicos[i].tipo = ROTULAS;
			mecanicos[i].tiempo = 0;
			mecanicos[i].idSolicitud = 99;
		}
		if( i >= 13 && i <= 15){
			mecanicos[i].id = id;
			mecanicos[i].estado = false;
			mecanicos[i].tipo = GASES;
			mecanicos[i].tiempo = 0;
			mecanicos[i].idSolicitud = 99;
		}
		if( i >= 16 && i <= 17){
			mecanicos[i].id = id;
			mecanicos[i].estado = false;
			mecanicos[i].tipo = LLANTERO;
			mecanicos[i].tiempo = 0;
			mecanicos[i].idSolicitud = 99;
		}
		id++;	
	}
}



void verMecanicos(){
	int i;
	printf("%-25s%-25s%-25s%-25s%-25s%\n","Tipo","ID","Tiempo", "Estado","Solicitud");
	for(i = 0 ; i <= 17; i++){
		if(mecanicos[i].tipo == 0){
			printf("%-25d%-25d%-25d%-25d%-25d%\n",mecanicos[i].tipo,mecanicos[i].id,mecanicos[i].tiempo, mecanicos[i].estado,mecanicos[i].idSolicitud);
		}
		if(mecanicos[i].tipo == 1){
			printf("%-25d%-25d%-25d%-25d%-25d%\n",mecanicos[i].tipo,mecanicos[i].id,mecanicos[i].tiempo,mecanicos[i].estado,mecanicos[i].idSolicitud);
		}
		if(mecanicos[i].tipo == 2){
			printf("%-25d%-25d%-25d%-25d%-25d%\n",mecanicos[i].tipo,mecanicos[i].id,mecanicos[i].tiempo,mecanicos[i].estado,mecanicos[i].idSolicitud);
		}
		if(mecanicos[i].tipo == 3){
			printf("%-25d%-25d%-25d%-25d%-25d%\n",mecanicos[i].tipo,mecanicos[i].id,mecanicos[i].tiempo,mecanicos[i].estado,mecanicos[i].idSolicitud);
		}
		if(mecanicos[i].tipo == 4){
			printf("%-25d%-25d%-25d%-25d%-25d%\n",mecanicos[i].tipo,mecanicos[i].id,mecanicos[i].tiempo,mecanicos[i].estado,mecanicos[i].idSolicitud);
		}
		if(mecanicos[i].tipo == 5){
			printf("%-25d%-25d%-25d%-25d%-25d%\n",mecanicos[i].tipo,mecanicos[i].id,mecanicos[i].tiempo,mecanicos[i].estado,mecanicos[i].idSolicitud);
		}
		if(mecanicos[i].tipo == 6){
			printf("%-25d%-25d%-25d%-25d%-25d%\n",mecanicos[i].tipo,mecanicos[i].id,mecanicos[i].tiempo,mecanicos[i].estado,mecanicos[i].idSolicitud);
		}
	}
}



void crearMaquinas(){
	srand(time(NULL)); 
	int i = 0;
	int id = 0;
	struct Mecanico aux;
	for(i ; i < 9; i++){
		if( i >= 0 && i <= 1){
			maquinas[i].id = id;
			maquinas[i].estado = false;
			maquinas[i].tipo= GATA_HIDRAULICA;
			maquinas[i].tiempo = 0;
			maquinas[i].apropiativo = rand() & 1;
					
		}
		if( i >= 2 && i <= 3){
			maquinas[i].id = id;
			maquinas[i].estado = false;
			maquinas[i].tipo= PISTOLA_PINTAR;
			maquinas[i].tiempo = 0;
			maquinas[i].apropiativo = rand() & 1;
			
		}
		if( i >= 4 ){
			maquinas[i].id = id;
			maquinas[i].estado = false;
			maquinas[i].tipo= TORNO;
			maquinas[i].tiempo = 0;
			maquinas[i].apropiativo = rand() & 1;	
		}
		if( i >= 5 ){
			maquinas[i].id = id;
			maquinas[i].estado = false;
			maquinas[i].tipo= SOLDADORA;
			maquinas[i].tiempo = 0;
			maquinas[i].apropiativo = rand() & 1;
		}
		if( i >= 6 && i <= 8){
			maquinas[i].id = id;
			maquinas[i].estado = false;
			maquinas[i].tipo= SOPLADORA;
			maquinas[i].tiempo = 0;
			maquinas[i].apropiativo = rand() & 1;
		}
		if( i >= 9 ){
			maquinas[i].id = id;
			maquinas[i].estado = false;
			maquinas[i].tipo= SANITARIO;
			maquinas[i].tiempo = 0;
			maquinas[i].apropiativo = rand() & 1;	
		}
		
		id++;	
	}
}

void verMaquinas(){
	int i ;
	printf("%-25s%-25s%-25s%-25s%\n","Tipo","ID","Tiempo", "Estado");
	for(i = 0 ; i < 9; i++){
		if(mecanicos[i].tipo == 0){
			printf("%-25d%-25d%-25d%-25d%\n",maquinas[i].tipo,maquinas[i].id,maquinas[i].tiempo,maquinas[i].estado);
		}
		if(mecanicos[i].tipo == 1){
			printf("%-25d%-25d%-25d%-25d%\n",maquinas[i].tipo,maquinas[i].id,maquinas[i].tiempo,maquinas[i].estado);
		}
		if(mecanicos[i].tipo == 2){
			printf("%-25d%-25d%-25d%-25d%\n",maquinas[i].tipo,maquinas[i].id,maquinas[i].tiempo,maquinas[i].estado);
		}
		if(mecanicos[i].tipo == 3){
			printf("%-25d%-25d%-25d%-25d%\n",maquinas[i].tipo,maquinas[i].id,maquinas[i].tiempo,maquinas[i].estado);
		}
		if(mecanicos[i].tipo == 4){
			printf("%-25d%-25d%-25d%-25d%\n",maquinas[i].tipo,maquinas[i].id,maquinas[i].tiempo,maquinas[i].estado);
		}
		if(mecanicos[i].tipo == 5){
			printf("%-25d%-25d%-25d%-25d%\n",maquinas[i].tipo,maquinas[i].id,maquinas[i].tiempo,maquinas[i].estado);
		}
		
	}
}

void verHerramientas(){
	int i ;
	printf("%-25s%-25s%-25s%-25s%\n","Tipo","ID","Tiempo", "Estado");
	for(i = 0 ; i <= 13; i++){
		if(herramientas[i].tipo == 0){
			printf("%-25d%-25d%-25d%-25d%\n",herramientas[i].tipo,herramientas[i].id,herramientas[i].tiempo,herramientas[i].estado);
		}
		if(herramientas[i].tipo == 1){
			printf("%-25d%-25d%-25d%-25d%\n",herramientas[i].tipo,herramientas[i].id,herramientas[i].tiempo,herramientas[i].estado);
		}
		if(herramientas[i].tipo == 2){
			printf("%-25d%-25d%-25d%-25d%\n",herramientas[i].tipo,herramientas[i].id,herramientas[i].tiempo,herramientas[i].estado);
		}
		if(herramientas[i].tipo == 3){
			printf("%-25d%-25d%-25d%-25d%\n",herramientas[i].tipo,herramientas[i].id,herramientas[i].tiempo,herramientas[i].estado);
		}
		if(herramientas[i].tipo == 4){
			printf("%-25d%-25d%-25d%-25d%\n",herramientas[i].tipo,herramientas[i].id,herramientas[i].tiempo,herramientas[i].estado);
		}
		if(herramientas[i].tipo == 5){
			printf("%-25d%-25d%-25d%-25d%\n",herramientas[i].tipo,herramientas[i].id,herramientas[i].tiempo,herramientas[i].estado);
		}
		if(herramientas[i].tipo == 6){
			printf("%-25d%-25d%-25d%-25d%\n",herramientas[i].tipo,herramientas[i].id,herramientas[i].tiempo,herramientas[i].estado);
		}
		
		
	}
}



void crearHerramientas(){
	srand(time(NULL)); 
	int i = 0;
	int id = 0;
	struct Mecanico aux;
	for(i ; i <= 13; i++){
		if( i >= 0 ){
			herramientas[i].id = id;
			herramientas[i].estado = false;
			herramientas[i].tipo= TELEFONO;
			herramientas[i].tiempo = 0;
			herramientas[i].apropiativo = rand() & 1;
					
		}
		if( i >= 1 ){
			herramientas[i].id = id;
			herramientas[i].estado = false;
			herramientas[i].tipo= JUEGOCUBOS;
			herramientas[i].tiempo = 0;
			herramientas[i].apropiativo = rand() & 1;
			
		}
		if( i >= 2 && i <= 3){
			herramientas[i].id = id;
			herramientas[i].estado = false;
			herramientas[i].tipo= RASH;
			herramientas[i].tiempo = 0;
			herramientas[i].apropiativo = rand() & 1;	
		}
		if(i >= 4 && i <= 5){
			herramientas[i].id = id;
			herramientas[i].estado = false;
			herramientas[i].tipo= DESATORNILLADORF;
			herramientas[i].tiempo = 0;
			herramientas[i].apropiativo = rand() & 1;
		}
		if( i >= 6 && i <= 8){
			herramientas[i].id = id;
			herramientas[i].estado = false;
			herramientas[i].tipo= DESATORNILLADORPP;
			herramientas[i].tiempo = 0;
			herramientas[i].apropiativo = rand() & 1;
		}
		if( i >= 9 && i <= 12){
			herramientas[i].id = id;
			herramientas[i].estado = false;
			herramientas[i].tipo= ALICATE;
			herramientas[i].tiempo = 0;
			herramientas[i].apropiativo = rand() & 1;	
		}
		if( i >= 13 ){
			herramientas[i].id = id;
			herramientas[i].estado = false;
			herramientas[i].tipo= JUEGOLLAVES;
			herramientas[i].tiempo = 0;
			herramientas[i].apropiativo = rand() & 1;	
		}
		
		id++;	
	}
}




int * elegirSolicitudMecanicosTipo(int n){
	
	int *mecanicosSol = (int*)malloc(sizeof(int)*n);
	int *mec = (int*)malloc(sizeof(int)*n);
	srand(time(NULL));
	bool check = false;
	int i;
	int j;
	for (i = 0; i < n; ++i) {
        int temp = (rand() %(6 - 0 + 0)) + 0;
        bool exists = false;
        for (j = 0; j < i; ++j) {
            if (mecanicosSol[j] == temp) {
                exists = true;
                break;
            }
        }

        if (!exists) {
            mecanicosSol[i] = temp;
            //printf("%d\n", nums[i]);
        }
        else {
            --i; // force the loop back
        }
    }
    
    int w ;
    int x ;
    int contador = 0;
    for(w = 0 ; w < n;w++){
    	for(x = 0; x < 18;x++){
    		if(mecanicosSol[w] == mecanicos[x].tipo){
    			mec[w] =  mecanicos[x].id+mecanicos[x].tipo;
    			contador++;
			}
		}	
	}


	return mec;
}

int * elegirSolicitudMaquinaTipo(int n){
	
	int *maquinasSol = (int*)malloc(sizeof(int)*n);
	int *maq = (int*)malloc(sizeof(int)*n);
	srand(time(NULL));
	bool check = false;
	int i;
	int j;
	for (i = 0; i < n; ++i) {
        int temp = (rand() %(5 - 0 + 0)) + 0;
        bool exists = false;
        for (j = 0; j < i; ++j) {
            if (maquinasSol[j] == temp) {
                exists = true;
                break;
            }
        }

        if (!exists) {
            maquinasSol[i] = temp;
            //printf("%d\n", nums[i]);
        }
        else {
            --i; // force the loop back
        }
    }
    
    int w ;
    int x ;
    int contador = 0;
    for(w = 0 ; w < n;w++){
    	for(x = 0; x < 9;x++){
    		if(maquinasSol[w] == maquinas[x].tipo){
    			maq [w] =  maquinas[x].id+maquinas[x].tipo;
    			contador++;
			}
		}	
	}


	return maq;
}

int * elegirSolicitudHerramientaTipo(int n){
	
	int *herramientaSol = (int*)malloc(sizeof(int)*n);
	int *herr = (int*)malloc(sizeof(int)*n);
	srand(time(NULL));
	bool check = false;
	int i;
	int j;
	for (i = 0; i < n; ++i) {
        int temp = (rand() %(6 - 0 + 0)) + 0;
        bool exists = false;
        for (j = 0; j < i; ++j) {
            if (herramientaSol[j] == temp) {
                exists = true;
                break;
            }
        }

        if (!exists) {
            herramientaSol[i] = temp;
            //printf("%d\n", nums[i]);
        }
        else {
            --i; // force the loop back
        }
    }
    
    int w ;
    int x ;
    int contador = 0;
    for(w = 0 ; w < n;w++){
    	for(x = 0; x < 13;x++){
    		if(herramientaSol[w] == herramientas[x].tipo){
    			herr[w] =  herramientas[x].id+herramientas[x].tipo;
    			contador++;
			}
		}	
	}


	return herr;
}

//24,2,3
//Devuelve los id de los mecanicos
int * buscarMecanicosPorTipo(int *tipos, int cantidadTipo, int cantidadMecanicos){
	int i = 0;
	int j = 1;
	int w = 0;
	int *asignados = (int*)malloc(sizeof(int)*cantidadMecanicos);
	
	for(i; i < cantidadMecanicos;i++){
		
		asignados[i] = verificarTipoMecanico(tipos,cantidadMecanicos,i);

	}
	
	return asignados;
}

int * buscarMaquinasPorTipo(int *tipos, int cantidadMaquinas){
	int i = 0;
	int j = 1;
	int w = 0;
	int *asignados = (int*)malloc(sizeof(int)*cantidadMaquinas);
	
	for(i; i < cantidadMaquinas;i++){
		
		
		asignados[i] = verificarTipoMaquina(tipos,cantidadMaquinas,i);
	}
	
	return asignados;
}

int * buscarHerramientasPorTipo(int *tipos, int cantidadHerramientas){
	int i = 0;
	int j = 1;
	int w = 0;
	int *asignados = (int*)malloc(sizeof(int)*cantidadHerramientas);
	
	for(i; i < cantidadHerramientas;i++){
		
		
		asignados[i] = verificarTipoHerramienta(tipos,cantidadHerramientas,i);
	}
	
	return asignados;
}

int verificarTipoMecanico(int *tipos, int total, int i){
	int j = 0;
	
	int id = 0;
	for(i ; i < total; i++){
		for(j ; j < 18;j++){
			if(tipos[i] == mecanicos[j].tipo && mecanicos[j].estado == false){
				id = mecanicos[j].id;
				mecanicos[j].estado = true;
			}
		}
	}
	
	
	return id;
}

int verificarTipoHerramienta(int *tipos, int total, int i){
	int j = 0;
	
	int id = 0;
	for(j ; j < 14;j++){
			if(tipos[i] == herramientas[j].tipo && herramientas[j].estado == false){
				id = herramientas[j].id;
				 herramientas[j].estado = true;
			}
		}
	
	
	return id;
}

int verificarTipoMaquina(int *tipos, int total, int i){
	int j = 0;
	
	int id = 0;
	for(i ; i < total; i++){
		for(j ; j < 10;j++){
			if(tipos[i] == maquinas[j].tipo && maquinas[j].estado == false){
				id = maquinas[j].id;
				maquinas[j].estado = true;
			}
		}
	}
	
	
	return id;
}


/*-------------------------------------------------------------*/

/*MATRICES PARA RECURSOS*/
void crearMatrizMaximos(){
		int ii = 0;
	for(ii ; ii < cantidadSolicitudes;ii++){
		matrizMaximos[ii] = (int*)malloc(TOTALRECURSOS*sizeof(int));
	}
//	
	int w = 0;
	int x = 0;
	for(w = 0; w < cantidadSolicitudes;w++){
		for(x = 0; x < TOTALRECURSOS;x++){
		if(x == 0){
				matrizMaximos[w][x]= (rand() %(3 - 1 + 1)) + 1;	
			}
			if(x == 1){
				matrizMaximos[w][x]= (rand() %(4 - 1 + 1)) + 1;	
			}
			
			if(x == 2){
				matrizMaximos[w][x]= (rand() %(4 - 1 + 1)) + 1;
			}
		}
	}
}

void verMatrizMaximos(){
	int r = 0;
	int c = 0;
	for (int r = 0; r < cantidadSolicitudes; r++)
    {
        for (int c = 0; c < TOTALRECURSOS; c++) {
            printf("%d ", matrizMaximos[r][c]);    
        }
 
        printf("\n");
    }
}

void crearMatrizAsignados(){
		int ii = 0;
	for(ii ; ii < cantidadSolicitudes;ii++){
		matrizAsignados[ii] = (int*)malloc(TOTALRECURSOS*sizeof(int));
	}
//	
	int w = 0;
	int x = 0;
	for(w = 0; w < cantidadSolicitudes;w++){
		for(x = 0; x < TOTALRECURSOS;x++){
			matrizAsignados[w][x]= 0;
		//	printf("%d\t",matrizMaximos[w][j]);
		}
	}
}

void verMatrizAsignados(){
	int r = 0;
	int c = 0;
	for (int r = 0; r < cantidadSolicitudes; r++)
    {
        for (int c = 0; c < TOTALRECURSOS; c++) {
            printf("%d ", matrizAsignados[r][c]);    
        }
 
        printf("\n");
    }
}

void crearMatrizNecesarios(){
		int ii = 0;
	for(ii ; ii < cantidadSolicitudes;ii++){
		matrizRestantes[ii] = (int*)malloc(TOTALRECURSOS*sizeof(int));
	}
//	
	int w = 0;
	int x = 0;
	for(w = 0; w < cantidadSolicitudes;w++){
		for(x = 0; x < TOTALRECURSOS;x++){
			matrizRestantes[w][x] = matrizMaximos[w][x]-matrizAsignados[w][x];
		//	printf("%d\t",matrizMaximos[w][j]);
		}
	}
}

void restaurarRecursosMatrizNecesarios(int solicitud){
	int w = 0;
	int x = 0;
	for(w = 0; w < cantidadSolicitudes;w++){
		for(x = 0; x < TOTALRECURSOS;x++){
			if(w == solicitud){
				matrizRestantes[solicitud][x] = matrizMaximos[solicitud][x]-matrizAsignados[solicitud][x];
			}
			
		}
	}
}

void verMatrizNecesarios(){
	int r = 0;
	int c = 0;
	for (int r = 0; r < cantidadSolicitudes; r++)
    {
        for (int c = 0; c < TOTALRECURSOS; c++) {
            printf("%d ", matrizRestantes[r][c]);    
        }
 
        printf("\n");
    }
}

void verRecursosDisponibles(){
	int r = 0;
	printf("\n-----------------------------------\n");
	printf("Recursos disponibles\n");
	printf("Me|Ma|H\n");
	for (int r = 0; r < 3; r++){
        
        printf("%d ", recursosDisponibles[r]);    
        
 
      
    }
    printf("\n-----------------------------------\n");
      printf("\n");
}

int compararValoresMatricesNR(int i){
	
	int j ;
	int retorno = 0;
	int contador = 0;
	bool verificar = false;
	for(i = 0; i < cantidadSolicitudes; i++){
		for(j = 0; j < TOTALRECURSOS;j++){
			if(matrizRestantes[i][j] <= recursosDisponibles[j] ){
				contador++;
			}else{
				return 0;
			}
		}
	}
	if(contador > 2){
		retorno = 1;
	}
	return retorno ;
}

void sumarValoresMatrizAsignados(int i){
	
	int j ;
	
	for(j = 0; j < TOTALRECURSOS; j++){
		matrizAsignados[i][j] = matrizAsignados[i][j]+matrizRestantes[i][j];
	}
}

void restarDisponibles(int i){
	int j;
	for(j = 0; j < TOTALRECURSOS; j++){
		recursosDisponibles[j] = recursosDisponibles[j]-matrizRestantes[i][j];
	}
}

bool compararMatrizMaxAsig(int i){
	int j ;
	int w = 0;
	for(j = 0; j < TOTALRECURSOS; j++){
		if(matrizMaximos[i][j] == matrizAsignados[i][j]){
			return true;
		//	recursosDisponibles[j] = recursosDisponibles[j] + matrizAsignados[i][j];
		}
		
	}
	
	return false;
}

void devolverRecursos(int i){
	int j ;
	int w = 0;
	for(j = 0; j < TOTALRECURSOS; j++){
		if(matrizMaximos[i][j] == matrizAsignados[i][j]){
			matrizMaximos[i][j] = 0;
			
			recursosDisponibles[j] = recursosDisponibles[j] + matrizAsignados[i][j];
			 matrizAsignados[i][j] = 0;
		}
		
	}
}

bool verificarSolicitudTerminado(int i){
	int j ;
	int w = 0;
	int contador = 0;
	bool verificar = false;
	for(j = 0; j < TOTALRECURSOS; j++){
		if(matrizRestantes[i][j] == 0){
			contador++;
		}
		
	}
	
	if(contador > 2){
		verificar = true;
	}
	
	return verificar;
}

void inicializarFinalizados(){
	int i;
	for(i = 0; i < cantidadSolicitudes;i++){
		finalizados[i] = 0;
	}
}

void actualizarMatrizNecesarios(int i){
	int j ;

	for(j = 0; j < TOTALRECURSOS; j++){
		matrizRestantes[i][j] = 0;
		
	}
}

/*----------------------------------------------------------------*/

void verMecanicosElegidosPorTipo(int* v, int total){
	int i;
	for(i = 0; i < total; i++ ){
		printf("Mecanico id: %d\n",v[i]);
	}
}

void verMaquinasElegidosPorTipo(int* v, int total){
	int i;
	for(i = 0; i < total; i++ ){
		printf("Maquinas id: %d\n",v[i]);
	}
}

void verHerramientasElegidosPorTipo(int* v, int total){
	int i;
	for(i = 0; i < total; i++ ){
		printf("Herramientas id: %d\n",v[i]);
	}
}




bool verificarFinalizacionSolicitudes(){
	int i;
	int contador = 0;
	bool verificar = false;
	for(i = 0; i < cantidadSolicitudes;i++){
		if(finalizados[i] == true){
			contador++;
		}
	}
	
	if(contador >=cantidadSolicitudes){
		verificar = true;
	}
	
	return verificar;
	
}

void mostrarDatosMecanicos(int* mec, int totalMecanicos){
	int i;
	int j;
	for(i = 0; i < totalMecanicos; i++){
		for(j = 0; j < 19; j++ ){
			if(mec[i] == mecanicos[j].id){
				if(mecanicos[j].tipo == ELECTRICISTA){
					printf("Electricista \t%d min\n",mecanicos[j].tiempo);
				}
				if(mecanicos[j].tipo == PINTOR){
					printf("Pintor \t%d min\n",mecanicos[j].tiempo);
				}
				
				if(mecanicos[j].tipo == MOTOR){
					printf("Motor \t%d min\n",mecanicos[j].tiempo);
				}
				
				if(mecanicos[j].tipo == CAJA){
					printf("Caja \t%d min\n",mecanicos[j].tiempo);
				}
				
				if(mecanicos[j].tipo == ROTULAS){
					printf("Rotulas \t%d min\n",mecanicos[j].tiempo);
				}
				if(mecanicos[j].tipo == GASES){
					printf("Gases \t%d min\n",mecanicos[j].tiempo);
				}
				if(mecanicos[j].tipo == LLANTERO){
					printf("Llantero \t%d min\n",mecanicos[j].tiempo);
				}
			}
		}
	}
}

void mostrarDatosMaquinas(int* maq, int totalMaquinas){
	int i;
	int j;
	for(i = 0; i < totalMaquinas; i++){
		for(j = 0; j < 10; j++ ){
			if(maq[i] == maquinas[j].id){
				if(maquinas[j].tipo == GATA_HIDRAULICA){
					printf("Gata hidraulica \t%d min\n",maquinas[j].tiempo);
				}
				if(maquinas[j].tipo == PISTOLA_PINTAR){
					printf("Pistola pintar\t%d min\n",maquinas[j].tiempo);
				}
				if(maquinas[j].tipo == TORNO){
					printf("Torno \t%d min\n",maquinas[j].tiempo);
				}
				if(maquinas[j].tipo == SOLDADORA){
					printf("Soldadora \t%d min\n",maquinas[j].tiempo);
				}
				if(maquinas[j].tipo == SOPLADORA){
					printf("Sopladora \t%d min\n",maquinas[j].tiempo);
				}
				if(maquinas[j].tipo == SANITARIO){
					printf("Sanitario \t%d min\n",maquinas[j].tiempo);
				}
			}
		}
	}
}

void mostrarDatosHerramientas(int* herr, int totalHerramientas){
	int i;
	int j;
	for(i = 0; i < totalHerramientas; i++){
		for(j = 0; j < 14; j++ ){
			if(herr[i] == herramientas[j].id){
				if(herramientas[j].tipo == TELEFONO){
					printf("Telefono \t%d min\n",herramientas[j].tiempo);
				}
				if(herramientas[j].tipo == JUEGOCUBOS){
					printf("Juego de cubos \t%d min\n",herramientas[j].tiempo);
				}
				if(herramientas[j].tipo == RASH){
					printf("Rash \t%d min\n",herramientas[j].tiempo);
				}
				if(herramientas[j].tipo == DESATORNILLADORF){
					printf("Desatornillador Filips \t%d min\n",herramientas[j].tiempo);
				}
				if(herramientas[j].tipo == DESATORNILLADORPP){
					printf("Desatornillador Punta plana \t%d min\n",herramientas[j].tiempo);
				}
				if(herramientas[j].tipo == ALICATE){
					printf("Alicate \t%d min\n",herramientas[j].tiempo);
				}
				if(herramientas[j].tipo == JUEGOLLAVES){
					printf("Juego de llaves\t%d min\n",herramientas[j].tiempo);
				}
				
			}
		}
	}
}

void crearCubos(){
	int i;
	int numeracion = 1;
	for(i = 0; i < 30;i++){
		cubos[i].numeracion = numeracion;
		cubos[i].estado = false;
		cubos[i].sol = 99;
		numeracion++;
	}
}

void verCubos(){
	int i;
	
	printf("Cubos\n");
	printf("Numeracion\tEstado\n");
	for(i = 0; i < 30;i++){
		printf("%d\t%d\n",cubos[i].numeracion,cubos[i].estado);
	}
}

void crearLlaves(){
	int i;
	int numeracion = 10;
	for(i = 1; i <= 21;i++){
		llaves[i].numeracion = numeracion;
		llaves[i].estado = false;
		numeracion++;
	}
}

void verLlaves(){
		int i;
	
	printf("Llaves\n");
	printf("Numeracion\tEstado\n");
	for(i = 1; i <= 21;i++){
		printf("%d\t%d\n",llaves[i].numeracion,llaves[i].estado);
	}
}

void asignarSolicitudAMecanicos(int *p, int cantidad, int sol){
	int i ;
	int j ;
	int contador = 0;
	for(i = 0; i < cantidad;i++){
		for(j = 0; j < 18; j++){
			int aux = mecanicos[j].tipo+mecanicos[j].id;
			
			if(p[i] == aux && mecanicos[j].estado == false){
				//printf("AUX: %d\n",aux);
				mecanicos[j].idSolicitud = sol;
				mecanicos[j].estado = true;
				mecanicos[j].tiempo = (rand() %(3 - 1 + 1)) + 1;
				
				
			}	
		}
	
		
	}
}

void asignarSolicitudAMaquinas(int *p, int cantidad, int sol){
	int i ;
	int j ;
	int contador = 0;
	for(i = 0; i < cantidad;i++){
		for(j = 0; j < 9; j++){
			int aux = maquinas[j].tipo+maquinas[j].id;
			
			if(p[i] == aux && maquinas[j].estado == false){
				//printf("AUX: %d\n",aux);
				maquinas[j].idSolicitud = sol;
				maquinas[j].estado = true;
				maquinas[j].tiempo = (rand() %(3 - 1 + 1)) + 1;
				
				
			}	
		}
	
		
	}
}

void asignarSolicitudAHerramientas(int *p, int cantidad, int sol){
	int i ;
	int j ;
	int contador = 0;
	for(i = 0; i < cantidad;i++){
		for(j = 0; j < 13; j++){
			int aux = herramientas[j].tipo+herramientas[j].id;
			
			if(p[i] == aux && herramientas[j].estado == false ){
				//printf("AUX: %d\n",aux);
				herramientas[j].idSolicitud = sol;
				herramientas[j].estado = true;
				herramientas[j].tiempo = (rand() %(3 - 1 + 1)) + 1;
				
				
				
				
			}	
			
			if(aux == 2 || aux == 19){
				herramientas[j].numeracionCubo = generarNumeroCubo();
				asignarCuboLlaveASolicitud(herramientas[j].numeracionCubo,sol);
			}
			
		}
	
		
	}
}

int resetearTiempo(int sol){
	int i;
	int time = 0;
	for(i = 0; i <= 17;i++){
		if(mecanicos[i].idSolicitud == sol){
			time+= mecanicos[i].tiempo;
		}	
	}
	
	for(i = 0; i <=9; i++){
		if(maquinas[i].idSolicitud == sol){
			time+= maquinas[i].tiempo;
		}
	}
	
	for(i = 0; i <=13; i++){
		if(herramientas[i].idSolicitud == sol){
			time+= herramientas[i].tiempo;
		}
	}
	
	return time;
	
}

void reducirTiempoMecanico(int sol){
	
	int i;
	
	for(i = 0; i <= 17;i++){
		if(mecanicos[i].idSolicitud == sol){
			pthread_mutex_lock(&semaforo2);
			mecanicos[i].tiempo = mecanicos[i].tiempo - (rand() %(4 - 1 + 1)) + 1;
			pthread_mutex_unlock(&semaforo2);
		}	
	}
	
//	for(i = 0; i <= 17;i++){
//		if(mecanicos[i].tiempo <= 0){
//			mecanicos[i].estado = false;
//			mecanicos[i].idSolicitud = 99;
//			mecanicos[i].tiempo = 0;
//		}	
//	}
	
	
	for(i = 0; i <= 9;i++){
		if(maquinas[i].idSolicitud == sol){
			pthread_mutex_lock(&semaforo2);
			maquinas[i].tiempo =maquinas[i].tiempo - (rand() %(4 - 1 + 1)) + 1;
			pthread_mutex_unlock(&semaforo2);
		}	
	}
	
//	for(i = 0; i <= 9;i++){
//		if(maquinas[i].tiempo <= 0){
//			maquinas[i].estado = false;
//			maquinas[i].idSolicitud = 99;
//			maquinas[i].tiempo = 0;
//		}	
//	}
	
	for(i = 0; i <= 13;i++){
		if(herramientas[i].idSolicitud == sol){
			pthread_mutex_lock(&semaforo2);
			herramientas[i].tiempo =herramientas[i].tiempo - (rand() %(4 - 1 + 1)) + 1;
			pthread_mutex_unlock(&semaforo2);
		}	
	}
	
//	for(i = 0; i <= 13;i++){
//		if(herramientas[i].tiempo <= 0){
//			herramientas[i].estado = false;
//			herramientas[i].idSolicitud = 99;
//			herramientas[i].tiempo = 0;
//		}
//	}
		
	
	
}

void desocuparMecanico(int sol){
	int i;
	
	for(i = 0; i <= 17;i++){
		if(mecanicos[i].idSolicitud == sol  ){
			mecanicos[i].tiempo = 0;
			mecanicos[i].estado = false;
			mecanicos[i].idSolicitud = 99;
		}	
	}
}

void desocuparMaquina(int sol){
	int i;
	
	for(i = 0; i <= 9;i++){
		if(maquinas[i].idSolicitud == sol  ){
			maquinas[i].tiempo = 0;
			maquinas[i].estado = false;
			maquinas[i].idSolicitud = 99;
		}	
	}
}

void desocuparHerramienta(int sol){
	int i;
	
	for(i = 0; i <= 13;i++){
		if(herramientas[i].idSolicitud == sol  ){
			herramientas[i].tiempo = 0;
			herramientas[i].estado = false;
			herramientas[i].idSolicitud = 99;
		}	
	}
}

void detallarMecanicosSolicitud(int sol){
	int j;
	for(j = 0 ; j <= 17; j++){
		if(mecanicos[j].idSolicitud == sol){
				if(mecanicos[j].tipo == ELECTRICISTA){
					printf("Electricista \t%d min\n",mecanicos[j].tiempo);
				}
				if(mecanicos[j].tipo == PINTOR){
					printf("Pintor \t%d min\n",mecanicos[j].tiempo);
				}
				
				if(mecanicos[j].tipo == MOTOR){
					printf("Motor \t%d min\n",mecanicos[j].tiempo);
				}
				
				if(mecanicos[j].tipo == CAJA){
					printf("Caja \t%d min\n",mecanicos[j].tiempo);
				}
				
				if(mecanicos[j].tipo == ROTULAS){
					printf("Rotulas \t%d min\n",mecanicos[j].tiempo);
				}
				if(mecanicos[j].tipo == GASES){
					printf("Gases \t%d min\n",mecanicos[j].tiempo);
				}
				if(mecanicos[j].tipo == LLANTERO){
					printf("Llantero \t%d min\n",mecanicos[j].tiempo);
				}
		}
				
	}
}

void detallarMaquinasSolicitud(int sol){
	int j;
	for(j = 0 ; j <= 9; j++){
		if(maquinas[j].idSolicitud == sol){
				if(maquinas[j].tipo == GATA_HIDRAULICA){
					printf("Gata hidraulica \t%d min\n",maquinas[j].tiempo);
				}
				if(maquinas[j].tipo == PISTOLA_PINTAR){
					printf("Pistola pintar\t%d min\n",maquinas[j].tiempo);
				}
				if(maquinas[j].tipo == TORNO){
					printf("Torno \t%d min\n",maquinas[j].tiempo);
				}
				if(maquinas[j].tipo == SOLDADORA){
					printf("Soldadora \t%d min\n",maquinas[j].tiempo);
				}
				if(maquinas[j].tipo == SOPLADORA){
					printf("Sopladora \t%d min\n",maquinas[j].tiempo);
				}
				if(maquinas[j].tipo == SANITARIO){
					printf("Sanitario \t%d min\n",maquinas[j].tiempo);
				}
		}
				
	}
}

void detallarHerramientasSolicitud(int sol){
	int j;
	for(j = 0 ; j <= 13; j++){
		if(herramientas[j].idSolicitud == sol){
			if(herramientas[j].tipo == TELEFONO){
					printf("Telefono \t%d min\n",herramientas[j].tiempo);
				}
				if(herramientas[j].tipo == JUEGOCUBOS){
					printf("Juego de cubos Num %d \t%d min\n",herramientas[j].numeracionCubo,herramientas[j].tiempo);
					
				}
				if(herramientas[j].tipo == RASH){
					printf("Rash \t%d min\n",herramientas[j].tiempo);
				}
				if(herramientas[j].tipo == DESATORNILLADORF){
					printf("Desatornillador Filips \t%d min\n",herramientas[j].tiempo);
				}
				if(herramientas[j].tipo == DESATORNILLADORPP){
					printf("Desatornillador Punta plana \t%d min\n",herramientas[j].tiempo);
				}
				if(herramientas[j].tipo == ALICATE){
					printf("Alicate \t%d min\n",herramientas[j].tiempo);
				}
				if(herramientas[j].tipo == JUEGOLLAVES){
					printf("Juego de llaves Num %d \t%d min\n",herramientas[j].numeracionCubo,herramientas[j].tiempo);
					
				}	
		}
				
	}
}

void guardarEstadoSolicitud(int solicitud, int placa, int mecanicos, int maquinas, int herramientas){
	FILE *fp;
	fp = fopen("estadoSolicitudes.txt","a");
	fprintf(fp,"%d %d %d %d %d\n",solicitud,placa,mecanicos,maquinas,herramientas);
	fclose(fp);
}


void restaurarRecursosMatrizNecesariosRollback(int solicitud, int mec, int maq, int herr){
	
	matrizRestantes[solicitud][0] =  abs(mec);
	matrizRestantes[solicitud][1] = abs(maq);
	matrizRestantes[solicitud][2] = abs(herr);
	

}

void restaurarEstadoRollback(int sol, int placaS){
	int solicitud = 0;
int placa = 0;
int cantMec = 0;
int cantMaq = 0;
int cantHerra = 0;
	FILE *fp;
	if((fp = fopen("estadoSolicitudes.txt","r")) == NULL){
		printf("El archivo no puede abrirse\n");
	}else{
		
		while ( !feof(fp) )  { 
			fscanf(fp,"%d%d%d%d%d",&solicitud,&placa,&cantMec,&cantMaq,&cantHerra);
		
			if(placa == placaS){
				printf("Solicitud encontrada %d %d %d %d %d\n", solicitud,placa,cantMec,cantMaq,cantHerra);		 
				restaurarRecursosMatrizNecesariosRollback(sol,cantMec,cantMaq,cantHerra);
				break;
			}
               
        } 
	//	printf("%d:",solicitud);
		printf("\n");
		fclose(fp);
	}
}

int generarNumeroCubo(){
	
	int temp = 0;
	int numeroCubo = 0;
	srand(time(NULL));
	bool check = false;
	int i;
	int j;
	
	
	
	for (i = 0; i < 1; ++i) {
        int temp = (rand() %(30 - 1 + 1)) + 1;
        bool exists = false;
        for (j = 0; j < i; ++j) {
            if (numeroCubo == temp) {
                exists = true;
                break;
            }
        }

        if (!exists) {
            numeroCubo = temp;
            //printf("%d\n", nums[i]);
        }
        else {
            --i; // force the loop back
        }
    }
    
   return numeroCubo;

	
}

int generarNumeroLlave(){
	
	int temp = 0;
	int numeroLlave = 0;
	srand(time(NULL));
	bool check = false;
	int i;
	int j;
	
	
	
	for (i = 0; i < 1; ++i) {
        int temp = (rand() %(30 - 10 + 1)) + 10;
        bool exists = false;
        for (j = 0; j < i; ++j) {
            if (numeroLlave == temp) {
                exists = true;
                break;
            }
        }

        if (!exists) {
            numeroLlave = temp;
            //printf("%d\n", nums[i]);
        }
        else {
            --i; // force the loop back
        }
    }
    
   return numeroLlave;

	
}

bool verificarDisponibilidadCubo(int numeracion){
	bool disponible = true;
	int i;
	for(i = 0 ; i < 30;i++){
		if(cubos[i].numeracion == numeracion && cubos[i].estado == true){
			disponible = false;
		}
	}
	
	return disponible;
}

bool verificarDisponibilidadLlave(int numeracion){
	bool disponible = true;
	int i;
	for(i = 0 ; i < 20;i++){
		if(llaves[i].numeracion == numeracion && llaves[i].estado == true){
			disponible = false;
		}
	}
	
	return disponible;
}



void asignarCuboLlaveASolicitud(int numeracion, int solicitud){
	int i ;
	if(verificarDisponibilidadCubo(numeracion)){
		//printf("\nCubo solicitado disponible\n");
		for(i = 0 ; i < 30;i++){
			if(cubos[i].numeracion == numeracion){
				cubos[i].estado = true;
				cubos[i].sol = solicitud;
				
			}
		}
	}else if(verificarDisponibilidadLlave(numeracion) && numeracion >= 10) {
	//	printf("\nCubo solicitado no disponible, probando llave.\n");
		for(i = 0 ; i < 20;i++){
			if(llaves[i].numeracion == numeracion){
				llaves[i].estado = true;
				llaves[i].sol = solicitud;
			}
		}
	}else{
		printf("\nCubo y llave no disponibles\n");
	}
	
}
int main(){
	srand(time(NULL)); 
	//cantidadSolicitudes = (rand() %(10 - 5 + 1)) + 5;
	
	cantidadSolicitudes = 10;
	hiloSolicitudes = (pthread_t*)malloc(sizeof(pthread_t)*cantidadSolicitudes); 
	matrizMaximos = malloc((cantidadSolicitudes * TOTALRECURSOS) * sizeof(int));
	matrizRestantes = malloc((cantidadSolicitudes * TOTALRECURSOS) * sizeof(int));
	matrizAsignados = malloc((cantidadSolicitudes * TOTALRECURSOS) * sizeof(int));
	finalizados = malloc((cantidadSolicitudes) * sizeof(int));
	//agregarNuevaSolicitud(&colaSolicitudes,12,1,2,3);
	//mostrarColaSolicitud(colaSolicitudes);
	crearMecanicos();
	printf("\nLista de mecanicos\n");
//	verMecanicos();
	crearMaquinas();
//	verMaquinas();
	crearHerramientas();
//	verHerramientas();
//	actualizarEstadoMecanico(3,true);
	printf("\n");
//	printf("Mecanico elegido: %d\n", elegirMecanico(ELECTRICISTA));
//	printf("Mecanico elegido: %d\n", elegirMecanico(ELECTRICISTA));
	
	/*IMPLEMENTACIÓN PARA RECURSOS Y ESTRUCTURAS*/
//	struct Solicitud s;
//	s.id = 1;
//	s.totalTiempo = 0;
//	s.numeroPlaca = 1000;
//	//Este valor viene de la matriz, igual que los demas valores
//	s.totalMecanicosAsignados = 3;
//	s.totalMaquinasAsignadas = 2;
//	s.totalHerramientasAsignadas = 3;
//	printf("Total de mecanicos asignados: %d\n",s.totalMecanicosAsignados);
//	//Se buscan id's de tipo de mecanico 
//	int *p = elegirSolicitudMecanicosTipo(s.totalMecanicosAsignados); //consigo los tipos
////	int *p2 = elegirSolicitudMaquinaTipo(s.totalMaquinasAsignadas);
////	int *p3 = elegirSolicitudHerramientaTipo(s.totalHerramientasAsignadas);
//	//verMecanicosElegidosPorTipo(p,s.totalMecanicosAsignados);
//	asignarSolicitudAMecanicos(p,s.totalMecanicosAsignados,s.id);
//	detallarMecanicosSolicitud(s.id);
//	verMecanicos();
//	s.totalTiempo = resetearTiempo(s.id);
//	printf("Total tiempo: %d\n",s.totalTiempo);
//	reducirTiempoMecanico(s.id);
//	s.totalTiempo = resetearTiempo(s.id);
//	printf("Total tiempo reducido: %d\n",s.totalTiempo);
//	reducirTiempoMecanico(s.id);
//	s.totalTiempo = resetearTiempo(s.id);
//	printf("Total tiempo reducido: %d\n",s.totalTiempo);
//	reducirTiempoMecanico(s.id);
//	s.totalTiempo = resetearTiempo(s.id);
//	printf("Total tiempo reducido: %d\n",s.totalTiempo);
//	reducirTiempoMecanico(s.id);
//	s.totalTiempo = resetearTiempo(s.id);
//	printf("Total tiempo reducido: %d\n",s.totalTiempo);
//	reducirTiempoMecanico(s.id);
//	s.totalTiempo = resetearTiempo(s.id);
//	printf("Total tiempo reducido: %d\n",s.totalTiempo);
//		s.totalTiempo = resetearTiempo(s.id);
//	printf("Total tiempo reducido: %d\n",s.totalTiempo);
//	if(s.totalTiempo <= 0){
//			desocuparMecanico(s.id);
//	}
//
//	verMecanicos();
////	verMecanicos();
//	//Con los id de tipos de mecanicos se buscan mecanicos(id) con esas caracteristicas
////	s.listaMecanicos = buscarMecanicosPorTipo(p,s.totalMecanicosAsignados,s.totalMecanicosAsignados);
////	s.listaMaquinas = buscarMaquinasPorTipo(p2,s.totalMaquinasAsignadas);
////	s.listaHerramientas = buscarHerramientasPorTipo(p3,s.totalHerramientasAsignadas);
////	verMecanicosElegidosPorTipo(s.listaMecanicos,s.totalMecanicosAsignados);
//	
////	actualizarMecanicoRecursos(s.listaMecanicos,s.totalMecanicosAsignados);
////	actualizarMaquinaRecursos(s.listaMaquinas,s.totalMaquinasAsignadas);
////	actualizarHerramientasRecursos(s.listaHerramientas,s.totalHerramientasAsignadas);
////	verMecanicos();
//	
//	//s.totalTiempo = calcularSumatoriaTiempoHerramientas(s)+calcularSumatoriaTiempoMaquinas(s)+calcularSumatoriaTiempoMecanicos(s);
//	s.asignado = true;
////	printf("\nTiempo total de solicitud: %d\n",s.totalTiempo);
////		mostrarDatosMecanicos(s.listaMecanicos,s.totalMecanicosAsignados);
////	printf("\n");
////	mostrarDatosMaquinas(s.listaMaquinas,s.totalMaquinasAsignadas);
////	printf("\n");
////	mostrarDatosHerramientas(s.listaHerramientas,s.totalHerramientasAsignadas);
////	printf("\n");
//	
////	reducirTiempoRecursos(s.listaMecanicos,s.totalMecanicosAsignados);
////	reducirTiempoRecursosHerramientas(s.listaHerramientas,s.totalHerramientasAsignadas);
////	reducirTiempoRecursosMaquinas(s.listaMaquinas,s.totalMaquinasAsignadas);
////	verMecanicos();
//	//s.totalTiempo = calcularSumatoriaTiempoHerramientas(s)+calcularSumatoriaTiempoMaquinas(s)+calcularSumatoriaTiempoMecanicos(s);;
//	printf("\nTiempo total de solicitud: %d\n",s.totalTiempo);
	//cambiarEstadoRecursos(s.listaMecanicos,s.totalMecanicosAsignados);
//	verMecanicos();
//	mostrarDatosMecanicos(s.listaMecanicos,s.totalMecanicosAsignados);
//	printf("\n");
//	mostrarDatosMaquinas(s.listaMaquinas,s.totalMaquinasAsignadas);
//	printf("\n");
//	mostrarDatosHerramientas(s.listaHerramientas,s.totalHerramientasAsignadas);
//	printf("\n");
	/*---------------------------------------------------------------------*/
	//Si tiempo == 0
	//Se buscan los recursos con su id y se les actualiza su estado
	//Se devuelven los recursos según el id de la solicitud
	//	//int cantidadMecanicos = generarCantidadMecanicos();
////	printf("%d",cantidadMecanicos);
//	
//	int j = 0;
//	for(j ; j <s.totalMecanicosAsignados;j++ ){
//		printf("Tipos%d\n",p[j]);
//	}
	
//	int i = 0;
//	for(i ; i <s.totalMecanicosAsignados;i++ ){
//		printf("Id%d\n",s.listaMecanicos[i]);
//	}
//	size_t n = sizeof mecanicos / sizeof *mecanicos;
//	
//	printf("Cantidad mec: %d\n",s.totalMecanicosAsignados );
//	
//	printf("Entero tipo: %d\n",ELECTRICISTA );
	
	//matrizMaximos = (int**)malloc(cantidadSolicitudes*sizeof(int*));
	
//
	id = cantidadSolicitudes;
	crearColaSolicitudes(&colaSolicitudes,cantidadSolicitudes);
	printf("\nCola solicitudes\n");
	mostrarColaSolicitud(colaSolicitudes);
	seleccionarSolicitudesCola(&colaSolicitudes,&colaListos, cantidadSolicitudes);
	//seleccionarSolicitudListo(&colaListos,&temporal,1);
//	printf("\nCola temporal\n\n");
//	mostrarColaListos(temporal);
	printf("\nCola listos\n");
	mostrarColaListos(colaListos);
	//verMatrizMaximos();
//	p = generarCantidadMecanicos()
	
	printf("\nM.Maximo\n\n");
	crearMatrizMaximos();
	verMatrizMaximos();
	
		printf("\nAsignados\n\n");
	crearMatrizAsignados();
	verMatrizAsignados();

	printf("\nNecesarios\n\n");
	crearMatrizNecesarios();
	verMatrizNecesarios();
	
	inicializarFinalizados();

	
	printf("\nRecursos disponibles\n\n");
	verRecursosDisponibles();
	
	
//	pthread_create(&(administrador), NULL, &comenzarEjecucion, NULL);
//    pthread_join(administrador, NULL);
	printf("\n\n");
//	if(compararValoresMatricesNR(1)){
//		sumarValoresMatrizAsignados(1);
//		restarDisponibles(1);
//	}
//	
//	printf("Asignados nuevos\n");
//	verMatrizAsignados();
//	
//	printf("Recursos nuevos\n");
//	verRecursosDisponibles();
//		printf("Recursos nuevos\n\n\n");


	/*IMPLEMENTACIÓN PARA RECURSOS de Maquinas*/
//	struct Solicitud s;
//	s.totalTiempo = 0;
//	s.numeroPlaca = 1000;
////	//Este valor viene de la matriz, igual que los demas valores
//	s.totalMaquinasAsignadas = generarCantidadMecanicos();
//	printf("Total de maquinas asignados: %d\n",s.totalMaquinasAsignadas);
////	//Se buscan id's de tipo de maquina
//	int *p = elegirSolicitudHerramientasTipo(s.totalMaquinasAsignadas); //consigo los tipos
////	//Con los id de tipos de mecanicos se buscan mecanicos(id) con esas caracteristicas
//	s.listaMaquinas= buscarMaquinasPorTipo(p,s.totalMaquinasAsignadas);
////
//	verMaquinasElegidosPorTipo(s.listaMaquinas,s.totalMaquinasAsignadas);
////	
//	actualizarMaquinaRecursos(s.listaMaquinas,s.totalMaquinasAsignadas);
//	verMaquinas();
////	
//	s.totalTiempo = actualizarTiempoTotalSolicitud(s);
////	s.asignado = true;
//	printf("\nTiempo total de solicitud: %d\n",s.totalTiempo);
////	reducirTiempoRecursos(s.listaMecanicos,s.totalMecanicosAsignados);
////	verMecanicos();
////	s.totalTiempo = actualizarTiempoTotalSolicitud(s);
////	printf("\nTiempo total de solicitud: %d\n",s.totalTiempo);
//	cambiarEstadoRecursos(s.listaMecanicos,s.listaMaquinas,s.totalMecanicosAsignados,s.totalMaquinasAsignadas);
////	verMecanicos();
//	verMaquinas();
	/*---------------------------------------------------------------------*/

//		
	pthread_create(&(administrador), NULL, &comenzarEjecucion, NULL);
    pthread_join(administrador, NULL);
	//restaurarEstado();
//	crearCubos();
//	crearLlaves();
//	asignarCuboLlaveASolicitud(10,1);
//	
//	verCubos();
//	asignarCuboLlaveASolicitud(10,1);
//	verLlaves();
//	asignarCuboLlaveASolicitud(10,1);

//	printf("Numero cubo es: %d", generarNumeroCubo());
//	crearCubos();
//	verCubos();
//	crearLlaves();
//	verLlaves();

//	verHerramientas();
	
//	actualizarMatrizNecesarios(1);
//	verMatrizNecesarios();
//	restaurarEstadoRollback(1,159108);
//	verMatrizNecesarios();
//	restaurarRecursosMatrizNecesarios(1);
//	printf("\n");
//		verMatrizNecesarios();
}
