#include <iostream>
#include <vector>
#include <string.h>
#include <sstream> 
#include <stdlib.h>  
#include <iomanip> //Acceder a metodo setw    
#include <conio.h> //Acceder a metodo getch
#include <windows.h> //Acceder a metodo Sleep()
using namespace std;
/*Clases*/
#include "VideoStudio.h"
#include "Pelicula.h"
#include "Juego.h"
#include "Interfaz.h"




int main(int argc, char** argv) {
	/*VARIABLES GENERALES*/
	Pelicula movie,*pPeli; //OBJETO PELICULA Y UN PUNTERO DEL MISMO TIPO
	vector<Pelicula> arreglo; //GUARDA LAS PELICULAS
	vector<Juego> juegos;
	Juego game, *pJuego;
	Interfaz in;
	VideoStudio vs;
	int n = 0;
	int opcion; //VARIABLE QUE DARA SALIDA A CUALQUIE METODO
	bool acceso = false;
	
	
	/*VARIABLES DE LA OPCION 6*/
	int elegir;
	string categoria;
	int total = 0;
	int venta;
	int cantidadVentas = 0;
	int copiasEnReserva;
	int copiasTotales;
	
	/*VARIABLES DEL METODO 13 JUEGOS*/
	int seleccionar;
	int totalVentaJuegos = 0;
	int ventaJuego;
	
	/*VARIABLES DE LA OPCION ALQUILAR*/
	int precioAlquiler;
	int totalAlquiler = 0;
	
	n=arreglo.size(); //OBTIENE EL TAMAÑO DEL ARREGLO QUE GUARDA LAS PELICULAS
	arreglo.clear(); //LIMPIA EL ARREGLO ANTES DE INGRESAR DATOS
	acceso = in.Login();
	if(acceso = true){
		do{
		system ("cls");
        //MENU EN PANTALLA
        cout << "\t*********************************************************\n";
        cout << "\t*\t\t VIDEOSTUDIO CINEMARK\t\t\t*\n";
        cout << "\t*\t\t DVD/BLU RAY/JUEGOS   \t\t\t*\n";
        cout << "\t*\t\t PS4-XBOX             \t\t\t*\n";
        cout << "\t*\t\t                    \t\t\t*\n";
        cout << "\t*\t\t1.Ingresar pelicula \t\t\t*\n";
        cout << "\t*\t\t2.Consultar pelicula \t\t\t*\n";
        cout << "\t*\t\t3.Modificar pelicula \t\t\t*\n";
        cout << "\t*\t\t4.Eliminar pelicula \t\t\t*\n";
        cout << "\t*\t\t5.Mostrar catalogo \t\t\t*\n";
        cout << "\t*\t\t6.Vender pelicula \t\t\t*\n";
        cout << "\t*\t\t7.Alquilar pelicula \t\t\t*\n";
        cout << "\t*\t\t8.Reportes de ventas peliculas\t\t*\n";
        cout << "\t*\t\t9.Reportes de discos\t\t\t*\n";
        cout << "\t*\t\t10.Reportes de ventas de juegos\t\t*\n"; ///
        cout << "\t*\t\t11.Pelicula mas vendida\t\t\t*\n"; ///
        cout << "\t*\t\t12.Reporte alquileres \t\t\t*\n";
        cout << "\t*\t\t13.Juegos              \t\t\t*\n";
        cout << "\t*\t\t14.Salir                \t\t\t*\n";
        cout << "\t*\t\t                    \t\t\t*\n";
        cout << "\t*********************************************************\n";
		cout << endl;
		opcion = in.leerOpcion();
		cout << "\a";
		
	
		
		switch(opcion){
			/*AGREGAR PELICULA*/
			case 1:{
				
				arreglo.push_back(in.ingresarPelicula(movie,pPeli,arreglo));
				
				cout << "Ingrese 7 para volver al menu: ";
				cin >> opcion;
				break;
			}
			/*CONSULTAR PELICULA*/
			case 2:{
				in.consultarPelicula(movie,pPeli,arreglo);
				cout << "Ingrese 7 para volver al menu: ";
				cin >> opcion;
				
				break;
			}
			/*MODIFICAR PELICULA*/
			case 3:{
				
				system("cls");
				movie.setReferencia(in.solicitarReferencia());
				pPeli = in.vector_buscar(arreglo, movie);
				if(pPeli == NULL){
					cout << endl << "  No se encontro pelicula.";
					cout << "Ingrese 7 para volver al menu: ";
					cin >> opcion;
						
				}else{
				cout << "Seleccione que desea modificar:\n1)Referencia\n2)Nombre\n3)Genero\n4)Director\n5)Actores\n6)Cantidad en stock\n";
				opcion = in.leerOpcion();
				in.modificar(opcion,pPeli);
				cout << endl << "\nRegistro actualizado correctamente."; // informa que los datos se registraron en archivo
				cout << "Ingrese 7 para volver al menu: ";
				cin >> opcion;
				}
				
				break;
			}
			/*ELIMINAR PELICULA*/
			case 4:{
				system("cls");
				movie.setReferencia(in.solicitarReferencia());
				pPeli = in.vector_buscar(arreglo, movie);
				vs.vector_quitar (arreglo, *pPeli);
				cout << endl << "  Registro borrado correctamente.";
				cout << "Ingrese 7 para volver al menu: ";
				cin >> opcion;
				break;
			}
			
			/*CATALOGO DE PELICULAS*/
			case 5:{
				system("cls");
        		cout << "***CATALOGO DE PELICULAS**\n\n";
				cout << "\n";
				cout << "------------------------------------------------";
        		cout << "\nReferencia\tNombre\t\tGenero\n";
				for(int i = 0; i < arreglo.size();i++){
					cout << arreglo[i].getReferencia()<< setw(20)<< arreglo[i].getNombre() << setw(17) << arreglo[i].getGenero() <<endl;
				}
				cout << "------------------------------------------------";
				cout <<"\n\n";
				cout << "Ingrese 7 para volver al menu: ";
				cin >> opcion;
			
				break;
			}
			/*VENTA DE PELICULAS*/
			case 6:{
				system("cls");
				cout << "**VENTA DE PELICULAS**\nIngrese referencia de pelicula para realizar la venta.\n\n\n";
				movie.setReferencia(in.solicitarReferencia());
				pPeli = in.vector_buscar(arreglo, movie);
				if(pPeli == NULL){
					cout << endl << "  No se encontro pelicula.";
					cout << "Ingrese 7 para volver al menu: ";
					cin >> opcion;
						
				}else{
				
				cout << "\n\nLa cantidad de copias de la pelicula que solicita es: " << pPeli->getCantidad() << endl;
					if(pPeli->getCantidad() == 0){
						cout << "No hay copias.\n";
						cout << "Ingrese 7 para volver al menu: ";
						cin >> opcion;
					}else{
						
						cout << "\nDesea una copia(1-Si/2-No): ";
				cin >> elegir;
				cout << endl;
				if(elegir == 1){
					cout << "\nLa desea en Blu ray o DVD normal?\n(Ingresar B para Blu Ray/Ingresar D para DVD): ";
					getline(cin,categoria);
					getline(cin,categoria);
					if(categoria == "D"){
						
						
						cout << "\nIngrese precio de venta: ";
						cin >> venta;
						total = total + venta;
						cout << "\n\nVenta exitosa!\n";
						copiasEnReserva = pPeli->getCantidad(); //Obtiene la cantidad en stock
						copiasTotales = copiasEnReserva-1; //le resta una
						pPeli->setCantidad(copiasTotales); //establece la nueva cantidad en stock
						
						cout << "\n\nIngrese 7 para volver al menu: ";
						cin >> opcion;
					}else if(categoria == "B"){
						cout << "Ingrese precio de venta: ";
						cin >> venta;
						total = total + venta;
						cout << "Venta exitosa!\n";
						copiasEnReserva = pPeli->getCantidad();
						copiasTotales = copiasEnReserva-1;
						pPeli->setCantidad(copiasTotales);
						/*++cantidadVentas;
						pPeli->setVentas(cantidadVentas);*/
						
						cout << "\n\nIngrese 7 para volver al menu: ";
						cin >> opcion;
					}
					cantidadVentas = 0;
					++cantidadVentas;
					int ventasEnAlmacen =0;
					ventasEnAlmacen = pPeli->getVentas() + cantidadVentas;
					
					pPeli->setVentas(ventasEnAlmacen);
					cantidadVentas = 0;
					ventasEnAlmacen = 0;
					
					
					
					
					
				}else{
					cout << "Ingrese 7 para volver al menu: ";
					cin >> opcion;
					
				}
					
				}
				
				
						
					}
				
				
				
				break;
			}
			/*ALQUILER*/
			case 7:{
				
				system("cls");
				cout << "***ALQUILER DE PELICULAS***\n\nIngrese referencia de pelicula para realizar el alquiler.\n\n\n";
				movie.setReferencia(in.solicitarReferencia());
				pPeli = in.vector_buscar(arreglo, movie);
				if(pPeli != NULL){
				in.imprimir(*pPeli);
				}
				
				if(pPeli == NULL){
					cout << endl << " No existe registro.\n\n";
					cout << "Ingrese 7 para volver al menu: ";
						cin >> opcion;
					
						
				}else{
					
				
				cout << "Desea una alquilar(1-Si/2-No): ";
				cin >> elegir;
				if(elegir == 1){
					cout << "\n\nLa desea en Blu ray o DVD normal?\n(Ingresar B para Blu Ray/Ingresar D para DVD): ";
					getline(cin,categoria);
					getline(cin,categoria);
					if(categoria == "D"){
						
						
						cout << "Ingrese precio de alquiler: ";
						cin >> precioAlquiler;
						totalAlquiler = totalAlquiler + precioAlquiler;
						cout << "\n\nAlquiler exitoso!\n";
					
					
						cout << "\n\nIngrese 7 para volver al menu: ";
						cin >> opcion;
					}else if(categoria == "B"){
						cout << "Ingrese precio de alquiler: ";
						cin >> precioAlquiler;
						totalAlquiler = totalAlquiler + precioAlquiler;
						cout << "Alquiler exitoso!\n";
						
						cout << "Ingrese 7 para volver al menu: ";
						cin >> opcion;
					}
					
					
					
					
					
				}else{
					cout << "Ingrese 7 para volver al menu: ";
					cin >> opcion;
					
				}
					
				}
				
				
				
				
				break;
			}
			/*TOTAL DE VENTASK*/
			case 8:{
				system("cls");
				cout << "**TOTAL DE DINERO EN VENTAS**\n\n";
				cout << "La cantidad de ventas durante el dia es: " << total;
				cout << "\n\nIngrese 7 para volver al menu: ";
				cin >> opcion;
					
				break;
			}
			/*CANTIDAD EN STOCK*/
			case 9:{
				system("cls");
				int totalDiscos = 0;
				
				for(int i = 0; i < arreglo.size();i++){
					totalDiscos = totalDiscos+arreglo[i].getCantidad();
				}
				cout << "**TOTAL DE DISCOS EN STOCK**\n\n";
				cout <<"La totalidad de discos en stock son: " << totalDiscos;
				cout << endl;
				cout << "\nIngrese 7 para volver al menu: ";
				cin >> opcion;
				break;
			}
			case 10:{
				system("cls");
				cout << "**TOTAL DE VENTAS DE JUEGOS**\n\n";
				cout <<"La totalidad de ventas en juegos es: " << totalVentaJuegos;
				cout << endl;
				cout << "\nIngrese 7 para volver al menu: ";
				cin >> opcion;
				break;
			}
			case 11:{
				system("cls");
				cout << "**PELICULA MAS VENDIDA**\n\n";
				int mayor;
				string referencia;
				if(arreglo.empty()){
					cout << "No hay informacion.\n\n";
					cout << "\nIngrese 7 para volver al menu: ";
					cin >> opcion;
				}else{
					mayor = arreglo[0].getVentas();
					referencia = arreglo[0].getReferencia();
				for(int i = 0; i < arreglo.size();i++){
					if(arreglo[i].getVentas()>mayor ){
						mayor = pPeli->getVentas();
						referencia = arreglo[i].getReferencia();
					}
				}
				cout << "Referencia de pelicula: " << referencia << endl;
				cout << "La pelicula mas vendida es:\n\n";
				
				movie.setReferencia(referencia);
				pPeli = in.vector_buscar(arreglo, movie);
				if(pPeli != NULL){
				in.imprimir(*pPeli);
				}
				cout << "\n\nIngrese 7 para volver al menu: ";
				cin >> opcion;	
				}
				
				
				
				break;
			}
			/*TOTAL DE DINERO EN ALQUILERES*/
			case 12:{
				system("cls");
				cout << "**TOTAL DE DINERO EN ALQUILERES**\n\n";
				cout <<"La totalidad en alquileres es: " << totalAlquiler;
				cout << endl;
				cout << "\n\nIngrese 7 para volver al menu: ";
				cin >> opcion;
				break;
			}
			/*VENTA DE JUEGOS*/
			case 13:{
				
				system("cls");
				cout << "**JUEGOS**\n1)Ingresar juego\n2)Vender juego\n3)Consulta de juegos\n4)Catalogo de juegos\n";
				cout << "\nIngrese la opcion deseada: ";
				cin >> seleccionar;
						switch(seleccionar){
							//INGRESAR JUEGO
							case 1:{
								juegos.push_back(in.ingresarJuego(game,pJuego,juegos));
								cout << "\n\nIngrese 7 para volver al menu: ";
								cin >> opcion;
								break;
							}
							///VENTA DE JUEGOS
							case 2:{
								system("cls");
								cout << "**VENTA DE JUEGOS**\nIngrese referencia de juego para realizar la venta.\n\n\n";
								game.setReferencia(in.solicitarReferencia());
								pJuego = in.vector_buscar(juegos, game);
								if(pJuego == NULL){
									cout << endl << "  No se encontro juego.\n";
									cout << "Ingrese 7 para volver al menu: ";
									cin >> opcion;
										
								}else{
									in.imprimirJuego(*pJuego);
									cout << "\nDesea comprar juego? (1-Si/2-No): ";
									cin >> elegir;
									cout << endl;
									if(elegir == 1){
									
											cout << "\nIngrese precio de venta: ";
											cin >> venta;
											totalVentaJuegos = total + venta;
											cout << "\n\nVenta exitosa!\n";
													
													
											cout << "\n\nIngrese 7 para volver al menu: ";
											cin >> opcion;
											
											break;
									}else if(elegir == 2){
											cout << "\n\nIngrese 7 para volver al menu: ";
											cin >> opcion;
									}
								}
						
						
						break;
						}
							///CONSULTA DE JUEGOS
							case 3:{
								in.consultarJuego(game,pJuego,juegos);
								cout << "\n\nIngrese 7 para volver al menu: ";
								cin >> opcion;
							
								break;
							}
							//CATALOGO DE JUEGOS
							case 4:{
								system("cls");
				        		cout << "***CATALOGO DE JUEGOS**\n\n";
								cout << "\n";
								cout << "------------------------------------------------";
				        		cout << "\nReferencia\tNombre\n";
								for(int i = 0; i < juegos.size();i++){
									cout << juegos[i].getReferencia()<< setw(20)<< juegos[i].getNombre() <<endl;
								}
								cout << "------------------------------------------------";
								cout <<"\n\n";
								cout << "Ingrese 7 para volver al menu: ";
								cin >> opcion;
								
								
								break;
							}
						}
			
				break;
			}	
			
			case 14:{
				system("cls");
				char texto[35] = "\nGracias por usar el sistema.";
				for (int i = 0; i < 35; i++){
        			cout << texto[i];
        			Sleep(200);
    			}
				exit(0);
				
				break;
			}
}
		
	}while(opcion == 7);
		
	}
	
	

	
	return 0;
}
