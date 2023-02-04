#include <iostream>
#include <ctime>
#include <fstream>
#include <sstream>
#include <conio.h>
#include <cctype>
#include <stdlib.h>
#include <vector>
using namespace std;
#include "ObraGris.h"
#include "Complejo.h"
#include "Cabina.h"
#include "Hotel.h"
#include "Interfaz.h"


	////Genera el menu de administrador
		void GenerarMenuAdministrador(){
			cout << "Bienvenido a las opciones de administrador!\n\n" << endl;
			cout << "Ingrese la opcion que desee: \n"; 
			cout << "1)Ingresar hoteles\n2)Ingresar cabinas\n3)Mostrar cantidad de hoteles registrados\n4)Mostrar cantidad de cabinas registradas\n5)Mostrar informacion de cabinas y hoteles registrados\n6)Mostrar cantidad de reservas realizadas en su totalidad\n7)Mostrar cantidad de reservas realizadas en un mes en especifico\n8)Volver al menu anterior\n";
			Interfaz menu;
			int opcion;
			cout << "Opcion: "; cin >> opcion;
			
			switch(opcion){
				//Ingresar hoteles
				case 1:{
					Hotel h;
					int contadorHoteles = 0; //contador
					string nombreHotel; //Guarda nombre hotel
					string nombreArchivo; //Se le concatena el nombre del hotel para generar extension txt
					int opcion;
					
					string pass; //password del usuario
					
					///Ingresar hotel
					cout << "Ingrese el nombre del hotel para crear registro: ";
					getline(cin,nombreHotel);
					getline(cin,nombreHotel);
					nombreArchivo = nombreHotel+".txt";
					//------------------------------------------------------
					
					//Crea el archivo del hotel donde se guardaran las reservas del mismo
					ofstream archivo(nombreArchivo.c_str());
					archivo.close();
					//---------------------------------------------------
					
					//Ingreso de informacion
					h.setUbicacion(menu.solicitarUbicacion());
					h.setCedulaJuridica(menu.solicitarCedulaJuridica());
					h.setResponsableLegal(menu.solicitarResponsable());
					h.setHabitacion(menu.RegistrarHabitaciones());
					h.setAlimentacion(menu.RegistrarTiposDeAlimentacion());
					h.setPrecio(menu.solicitarPrecio());
					h.setInfoPrecios(menu.RegistrarPreciosHabitacion(h.getPrecio()));
					system("cls");
					system("pause");
					system("cls");
					//----------------------------------------------------
					
					///Guardar informacion de hoteles ingresados
					ofstream file2;
					file2.open("InformacionDeHoteles.txt", ios::out | ios::app);
					file2 << nombreHotel << "|" << h.getUbicacion() << "|" << h.getCedulaJuridica() << "|" << h.getResponsableLegal() << "|" << h.getHabitacion() << "|" << h.getAlimentacion() << "|" << h.getInfoPrecios() << "\n";
					file2.close();
					///-------------------------------------------------------------------------
					
					//Ciclo que repite si no se ingresa la opcion deseada
					do{
						cout << "Para generar su password, presione 1: "; cin >> opcion;
						if(opcion == 1){
						
						pass = menu.ObtenerPassword(menu.GenerarPassword());
						
						}else{
						
						cout << "Opcion invalida!\n";
						system("pause");
						system("cls");
						}
						
					}while(opcion != 1);
					//----------------------------------------------------------	
						
					///Guarda un hotel cada vez que ingrese 
					++contadorHoteles; //Cuenta el hotel
					ofstream cuentaH;
					cuentaH.open("ContadorHoteles.txt",ios::out | ios::app);
					cuentaH << contadorHoteles << "\n"; //guarda la cantidad "1" en el fichero
					//-----------------------------------------------------------------------
					
					//Lee el archivo permisos y guarda el usuario y password
					ofstream file;
					file.open("Permisos.txt",ios::app | ios::out | ios::ate);
					if(file.is_open()){
						
						system("cls");
						cout << "\nSu nombre de usuario es: " << nombreHotel << endl;
						file << nombreHotel << " " << pass << " Empresario" << "\n";
						cout << "Su password es: " << pass << "\n(Por favor anotarlo para poder ingresar luego)" <<endl;
						file.close();
					}else{
						cout << "No se encontró";
					}
					
					///Muestras las opciones correspondientes
					cout << "\nHa finalizado el registro del hotel!\n";
					cout << "Para volver al menu principal presione 1.\nSi desea volver al menu de administrador presione 2.\nSi desea salir del sistema presione 3.\n";
					cin >> opcion;
					system("cls");
					if(opcion == 1){
						menu.GenerarMenu();
					}else if(opcion == 2){
						menu.GenerarMenuAdministrador(); /// solo muestra lo que está en el metodo :/
					}else if(opcion == 3){
						cout << "Gracias por usar el sistema.";
						exit(0);
						
					}
					
					
					break;
					
					
				} //caso 1
				//Ingresar cabinas
				case 2:{
					Cabina c;
					int contadorCabinas = 0; //contador
					string nombreCabina; //Guarda nombre cabina
					string nombreArchivo; //Se le concatena el nombre de la cabina para generar extension txt
					int opcion;
					
					string pass; //password del usuario
					
					///Ingresar cabina
					cout << "Ingrese el nombre de la cabina para crear registro: ";
					getline(cin,nombreCabina);
					getline(cin,nombreCabina);
					nombreArchivo = nombreCabina+".txt";
					//------------------------------------------------------
					
					//Crea el archivo del hotel donde se guardaran las reservas del mismo
					ofstream archivo(nombreArchivo.c_str());
					archivo.close();
					//---------------------------------------------------
					
					///Ingreso de informacion
					c.setTipoHabitacion(menu.RegistrarHabitacionesCabina());
					string tipo = c.getTipoHabitacion();
					cout << endl;
					if(tipo == "Extra grande/Familiar/Pareja"){ //Si el empresario escogio todas las opciones se solicitan el precio de todas las habitaciones
						double e_t,f,p;
						cout << "Precio Extra grande: "; cin >> e_t;
						cout << "Precio Familiar: "; cin >> f;
						cout << "Precio Pareja: "; cin >> p;
						
						c.setPrecioExtraGrande(e_t);
						c.setPrecioFamiliar(f);
						c.setPrecioPareja(p);
					}
					else if(tipo != "Extra grande/Familiar/Pareja"){ //Sino la que escoja el usuario
						c.setPrecio(menu.PrecioCabinas(c.getTipoHabitacion()));
					}
					c.setCantidadHabitacion(menu.solicitarCantidadHabitaciones());
					c.setUbicacion(menu.solicitarUbicacion());
					c.setCedulaJuridica(menu.solicitarCedulaJuridica());
					c.setResponsableLegal(menu.solicitarResponsable());
					c.setTelefono(menu.solicitarTelefono());
					
					system("cls");
					system("pause");
					system("cls");
					//--------------------------------------------------
					
					///Guardar informacion de hoteles ingresados
					ofstream file2;
					file2.open("InformacionDeCabinas.txt", ios::out | ios::app);
					
					/*Dependiendo del usuario en cuanto a si su cabina ofrece
					un solo tipo de habitacion o todos los tipos se guardará la informacion 
					de manera diferente en cuanto los precios*/
					
					if(tipo == "Extra grande/Familiar/Pareja"){ 
						file2 << nombreCabina << "|" << c.getUbicacion() << "|" << c.getCedulaJuridica() << "|" << c.getResponsableLegal() << "|" << c.getTipoHabitacion() << "|" << c.getTelefono() << "|" << c.getCantidadHabitacion() << "|EX:" << c.getPrecioExtraClase() << "|F:" << c.getPrecioFamiliar() << "|P" << c.getPrecioPareja() << "\n";
					}else if(tipo != "Extra grande/Familiar/Pareja"){
						file2 << nombreCabina << " |" << c.getUbicacion() << "|" << c.getCedulaJuridica() << "|" << c.getResponsableLegal() << "|" << c.getTipoHabitacion() << "|" << c.getTelefono() << "|" << c.getCantidadHabitacion() << "|" << c.getPrecio() << "\n";
					}
					
					
					file2.close();
					///-------------------------------------------------------------------------
					
					//Ciclo que repite si no se ingresa la opcion deseada
					do{
						cout << "Para generar su password, presione 1: "; cin >> opcion;
						if(opcion == 1){
						
						pass = menu.ObtenerPassword(menu.GenerarPassword());
						
						}else{
						
						cout << "Opcion invalida!\n";
						system("pause");
						system("cls");
						}
						
					}while(opcion != 1);
					//----------------------------------------------------------
					
					///Guarda una cabina cada vez que se ingrese 
					++contadorCabinas; //Cuenta cabina
					ofstream cuentaH;
					cuentaH.open("ContadorCabinas.txt",ios::out | ios::app);
					cuentaH << contadorCabinas<< "\n"; //guarda la cantidad "1" en el fichero
					//-----------------------------------------------------------------------
					
					//Lee el archivo permisos y guarda el usuario y password
					ofstream file;
					file.open("Permisos.txt",ios::app | ios::out | ios::ate);
					if(file.is_open()){
						
						system("cls");
						cout << "\nSu nombre de usuario es: " << nombreCabina << endl;
						file << nombreCabina << " " << pass << " Empresario" << "\n";
						cout << "Su password es: " << pass << "\n(Por favor anotarlo para poder ingresar luego)" <<endl;
						file.close();
					}else{
						cout << "No se encontró";
					}
					
					///Muestras las opciones correspondientes
					int opc;
					cout << "\nHa finalizado el registro del hotel!\n";
					cout << "Si desea volver al menu principal presione 1.\nSi desea volver al menu de administrador presione 2.\nSi desea salir del sistema presione 3.\n";
					cin >> opc;
					system("cls");
					if(opc== 1){
						menu.GenerarMenu();
					}else if(opc== 2){
						menu.GenerarMenuAdministrador();
					}else if(opc == 3){
						cout << "Gracias por usar el sistema.";
						exit(0);
						
					}
					
					
					
					
					
					
					break;
				}
				//Obtener cantidad total de hoteles registrados
				case 3:{
					system("cls");
					int opcion;
					menu.ObtenerTotalHoteles();
					
					cout << "Si desea volver al menu principal presione 1.\nSi desea volver al menu de administrador presione 2.\nSi desea salir del sistema presione 3.\n";
					cin >> opcion;
					system("cls");
					
					if(opcion == 1){
						//GenerarMenu();
					}else if(opcion == 2){
						menu.GenerarMenuAdministrador();
					}else if(opcion == 3){
						cout << "Gracias por usar el sistema.";
						exit(0);
						
					}
					
					break;
				}
				//Obtener cantidad total de cabinas registrados
				case 4:{
					system("cls");
					int opcion;
					menu.ObtenerTotalCabinas();
					
					cout << "Si desea volver al menu principal presione 1.\nSi desea volver al menu de administrador presione 2.\nSi desea salir del sistema presione 3.\n";
					cin >> opcion;
					system("cls");
					
					if(opcion == 1){
						menu.GenerarMenu();
					}else if(opcion == 2){
						menu.GenerarMenuAdministrador();
					}else if(opcion == 3){
						cout << "Gracias por usar el sistema.";
						exit(0);
						
					}
					break;
				}	
				//Mostrar informacion de cabinas y hoteles registrados
				case 5:{
					
					ifstream archivo1;
					ifstream archivo2;
					stringstream ss;
					string linea1;
					vector<string> contenido;
					string linea2;
					
					archivo1.open("InformacionDeHoteles.txt",ios::in);
					archivo2.open("InformacionDeCabinas.txt",ios::in);
					//Lee archivo de hoteles
					system("cls");
					cout << "\t\t\t--Hoteles--"<< endl ;
					cout << "Hotel|Ubic|C.Juridica|ResponsableLegal|Habitaciones|Alimentacion|Precios\n";
					if(archivo1.is_open() ){
						while(getline(archivo1, linea1)){
						
						string contenido;
						contenido = contenido + linea1 + "\n";
						
						cout << contenido;
						cout << "______________________________________________________________________\n";
					}
					archivo1.close();
					
					}else{
					cout << "Error!";
					}
					//Lee archivo de cabinas
					cout << "\n\n\t\t\t--Cabinas--\n";
					cout << "Cabina|Ubic|C.Juridica|ResponsableLegal|Habitaciones|Tel|N.Habitacion|Precios\n";
					if(archivo2.is_open() ){
						while(getline(archivo2, linea2)){
						
						string contenido;
						contenido = contenido + linea2+ "\n";
						
						cout << contenido;
						
					}
					archivo2.close();
					
					}else{
					cout << "Error!";
					}
					
					cout << endl;
					cout << "Si desea volver al menu principal presione 1.\nSi desea volver al menu de administrador presione 2.\nSi desea salir del sistema presione 3.\n";
					cin >> opcion;
					system("cls");
					
					if(opcion == 1){
						menu.GenerarMenu();
					}else if(opcion == 2){
						menu.GenerarMenuAdministrador();
					}else if(opcion == 3){
						cout << "Gracias por usar el sistema.";
						exit(0);
						
					}
					break;
				}
				//Totalidad de reservas
				case 6:{
					
					cout << "La totalidad de reservas hechas son: ";
					
					break;
				}	
			
			}//switch 	
		}
		
//Variables globales
//Interfaz menu;


/*void CalcularDiferenciaFechas(int dia1, int mes, int ){
	
	int mes1,dia1,year1;
	int mes2,dia2,year2;
	
	cout << "Ingrese fecha de entrada: \n";
	cout << "Ingrese mes: ";
	cin >> mes1;
	cout << "Ingrese dia: ";
	cin >> dia1;
	cout << "Ingrese anio: ";
	cin >> year1;
	cout << "Ingrese fecha de salida: \n";
	cout << "Ingrese mes: ";
	cin >> mes2;
	cout << "Ingrese dia: ";
	cin >> dia2;
	cout << "Ingrese anio: ";
	cin >> year2;
	
	tm tm1 = make_tm(year2,mes2,dia2);    // April 2nd, 2012
	tm tm2 = make_tm(year1,mes1,dia1);    // February 2nd, 2003
	// Arithmetic time values.
	// On a posix system, these are seconds since 1970-01-01 00:00:00 UTC
	time_t time1 = mktime(&tm1);
	time_t time2 = mktime(&tm2);
	
	const int seconds_per_day = 60*60*24;
	time_t difference = (time1 - time2) / seconds_per_day;  
	
	cout << "La diferencia de dias es: " << difference;
	
}
*/

int main(int argc, char** argv){
	Interfaz n;
	n.GenerarMenu();
	//GenerarMenu();
	
	
	
	
	
	/*Hotel nuevo;
	Hotel nuevo2;
	Interfaz n;
	
	
	nuevo.setHabitacion(n.solicitarHabitacionHotel());
	
    
	
	nuevo.setPrecio(n.solicitarPrecioHabitacion(nuevo.getHabitacion()));
    
   	nuevo.setPrecio(n.ingresarPersonas(nuevo.getPrecio())) ;
    
	cout <<"\n" << nuevo.getPrecio() << endl;
	
	nuevo2.setHabitacion(n.RegistrarHabitaciones());
	nuevo2.setAlimentacion(n.RegistrarTiposDeAlimentacion());
	
	cout << "La habitacion registrada es: " << nuevo2.getHabitacion() << endl;
	cout << "La alimentacion registrada es: " << nuevo2.getAlimentacion();*/
	
	
	
	return 0;



}
