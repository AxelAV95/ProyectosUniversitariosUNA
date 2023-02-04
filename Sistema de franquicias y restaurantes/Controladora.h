#include "Logica.h"
#include "Interfaz.h"
#include "laberinto.h"
class Controladora{
	
	public:
		

	public:
		Controladora(){
		}
	
	void iniciar(){
	
	

	
	
    Interfaz in;
	Logica log;
	int opcionMenu = 0;
	string usuario, pass = "";
				//buscar en txt ese usuario y pass
	ifstream readUsuarios("usuario.txt");
	string linea = "";
	string adminidaux = "";
	string usuarioaux = "";
	string passaux = "";
	string tipoaux = "";
	string restaux = ""; // guarda el id del restaurante del cajero en caso de que exista
	int opcionUsuario = 0;
	int opcionAdmin = 0;
	vector<string> datosAdmin;
	vector<string> datosFranquicia;
	vector<string> datosRestaurante;
				

	do{
		system("cls");
		
		opcionMenu = in.opcionInicial();
		
		
		switch(opcionMenu){
			
			case 1:{
				system("cls");
				in.escribir("Ingrese Usuario : ") ;
				cin >> usuario;
				cout << endl;
				in.escribir("Ingrese Pass : ");
				cin >> pass;
				
	
	
				while (getline(readUsuarios,linea)) {
				stringstream iss(linea);
    			iss >> adminidaux >> usuarioaux >> passaux >> tipoaux >> restaux;
    		//	cout << adminidaux << usuarioaux << passaux << tipoaux;
    			
    			if (usuario == "admin_convention" && pass == "franqui_convention") {
    					adminidaux = "";
						usuarioaux = "";
						passaux = "";
						tipoaux = "";
						linea = "";
    
    					do{
    				system("cls");
    			opcionAdmin = in.opcionSuper();
    				
    					//switch
    			switch(opcionAdmin){
    				case 1:{
    					string nombre, representante, lema, descripcion = "";
    					in.escribir("Ingrese el nombre de la Franquicia : ");
    					getline(cin,nombre);
    					getline(cin,nombre);
    					in.saltoLinea();
    					in.escribir("Ingrese el Nombre del Representante : ");
    					getline(cin, representante);
    					in.saltoLinea();
    					in.escribir("Ingrese el Lema de la Franquicia : ");
    					getline(cin, lema);
    					in.saltoLinea();
    					in.escribir("Ingrese la FDescripcion de la Franquicia : ");
    					getline(cin, descripcion);
    					
    					
    					log.registrarFranquicia(nombre, representante, lema, descripcion);
    					in.escribir("Registrado con Exito. \n");
    					system("pause");
						break;
					}
					
					case 2:{
						string nombre, cargo, usuario, pass = "";
						int edad;
						system("cls");
						//log.registrarAdministrador();
						cout << "Ingrese el Nombre del Administrador: ";
    					getline(cin,nombre);
    					getline(cin,nombre);
    					in.saltoLinea();
    					cout << "Ingrese el Cargo: ";
    					getline(cin, cargo);
    					in.saltoLinea();
    					in.escribir("Ingrese la Edad: ");
    					in.saltoLinea();
    					
    					cout << endl;
    
						usuario = log.obtenerUsuario(nombre);
						pass = log.obtenerPass(edad,usuario);
						log.registrarAdministrador(nombre, edad, cargo, usuario, pass);
						in.escribir("Registrado con Exito.\n");
						system("pause");
						system("cls");
						break;
					}				
				}
    				
				}while(opcionAdmin!=3);
  			break;
			}else if(usuario == usuarioaux && pass == passaux && tipoaux == "2"){
				
				datosAdmin = log.buscarAdmin(adminidaux);
    			datosFranquicia = log.buscarFranquicia(datosAdmin[1]);
				adminidaux = "";
						usuarioaux = "";
						passaux = "";
						tipoaux = "";
    				linea = "";
    				
    			do{
    				system("cls");
				in.escribir("MENU ADMIN");
				in.saltoLinea();
    			cout << "Administrador Nombre : " + datosAdmin[2] + "\n";
    			cout << "Franquicia Nombre : " + datosFranquicia[1] + "\n\n\n";
    			opcionUsuario = in.opcionAdmin(); 	
    			in.saltoLinea();
    					//switch
    			switch(opcionUsuario){
    				case 1:{
    					string cedulajuridica, direccion, correo, tel, duenio = "";
    					int capacidad = 0;
    					// CODIGO PARA PEDIR DATOS CON LAS VARIABLES DE ARRIBA AQUI
    					in.escribir("Ingrese la Cedula Juridica : ");
    					getline(cin,cedulajuridica);
    					getline(cin,cedulajuridica);
    					in.saltoLinea();
    					in.escribir("Ingrese el Direccion : ");
    					getline(cin,direccion);
    					in.saltoLinea();
    					in.escribir("Ingrese el Correo : ");
    					getline(cin,correo);
    					in.saltoLinea();
    					
    					in.escribir("Ingrese el Telefono : ");
    					getline(cin,tel);
    					in.saltoLinea();
    					
    					in.escribir("Ingrese el Duenio : ");
    					getline(cin,duenio);
    					
    					in.saltoLinea();
    					
    					in.escribir("Ingrese la Capacidad del Restaurante : ");
    					cin >> capacidad;
    					in.saltoLinea();
    					
    					
    					
    					log.registrarRestaurante(datosFranquicia[1], cedulajuridica, direccion, correo, tel, capacidad, duenio);
    					in.escribir("Registrado con Exito. \n");
    					system("pause");
						break;
					}
					
					case 2:{
						string nombre, cedula, usuario;
						// CODIGO PARA PEDIR DATOS CON LAS VARIABLES DE ARRIBA AQUI
						
						in.escribir("Ingrese el Nombre: ");
    					getline(cin,nombre);
    					getline(cin,nombre);
    					cout << endl;
    					in.escribir("Ingrese la Cedula : ");
    					getline(cin,cedula);
    					cout << endl;
    					
    					
						usuario =  log.obtenerUsuario(nombre);
						
						
						log.registrarCajero(nombre, cedula, usuario, cedula);
						in.escribir("Registrado con Exito. \n");
    					system("pause");
						break;
					}
					
					case 3:{
						string nombre, descripcion = "";
						int precio = 0;
						// CODIGO PARA PEDIR DATOS CON LAS VARIABLES DE ARRIBA AQUI
						in.escribir("Ingrese El Nombre : ");
    					getline(cin,nombre);
    					getline(cin,nombre);
    					in.saltoLinea();
    					in.escribir("Ingrese La Descripcion : ");
    					getline(cin,descripcion);
    					in.saltoLinea();
						
							
						log.registrarProducto(datosFranquicia[1], nombre,precio,descripcion);
						in.escribir("Registrado con Exito. \n");
    					system("pause");
						break;
					}
					
					case 4:{
						//reporte de ingresos
						break;
					}
					
				}
    				
				}while(opcionUsuario!=5);
				
			break;
			
			}else if(usuario == usuarioaux && pass == passaux && tipoaux == "3"){
				adminidaux = "";
						usuarioaux = "";
						passaux = "";
						tipoaux = "";
    				int opcion = 0;
    					do{
    					system("cls");
						in.escribir("MENU CAJERO\n");
						in.saltoLinea();
						opcion = in.opcionCajero(); 
    					in.saltoLinea();	
    					//switch
    				switch(opcion){
    					case 1:{
    				
							//LISTO
							log.facturarOrden(restaux);
							in.escribir("Facturado con Exito. \n");
    						system("pause");
							break;
						}
					
						case 2:{
							//reporte
							break;
						}
					
						
					}
    				
				}while(opcion!=3);
    			
    				break;
    		
					}
		
		
				}
				
				
				break;
			}
			case 2:{
				
				int opcion = 0;
				do{
					
						system("cls");
						in.escribir("MENU CLIENTE\n");
			         	in.saltoLinea();
    			  opcion = in.opcionCliente();
    			
					switch(opcion){
						
						case 1:{
							log.solicitarOrden();
							in.escribir("Solicitado con Exito. \n");
    						system("pause");
							break;
						}
						
						case 2:{
							//jugar
							system("cls");
							cout << "BIENVENIDO AL LABERINTO\nTRASLADA EL CLIENTE(C) HASTA EL RESTAURANTE(R)\nINSTRUCCIONES: \nw: ARRIBA; s: ABAJO; a: IZQUIERDA; d: DERECHA\n\n";
							dibujarLaberinto();
							in.saltoLinea();
							moverClientes();
							in.escribir("HAS COMPLETADO EL LABERINTO!");
							in.saltoLinea();
							system("pause");
							opcion == 3;
							break;
						}
					}
					
				}while(opcion!=3);
				
				break;
			}
		}
		
	}while(opcionMenu != 3);
		
		}	
};
