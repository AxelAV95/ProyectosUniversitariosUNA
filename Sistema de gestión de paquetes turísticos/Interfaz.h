class Interfaz{
	
	
	public:
		
		//Estructura de fecha  //si está usando
		tm make_tm(int year, int month, int day){
    		tm tm = {0}; //Representa un tiempo y  una fecha en el calendario
    		tm.tm_year = year - 1900; // Los años cuentan desde 1900
    		tm.tm_mon = month - 1;    // Los meses cuentan desde Enero = 0
    		tm.tm_mday = day;         // Los dias se cuentan desde 1
    		return tm;
		}
		
		///Este metodo lo usara el turista para escoger el tipo de habitacion que desea del hotel
		string solicitarHabitacionHotel(){
			
			int room;
			string tipo;
			cout << "1) Deluxe\n2) Estandar\n";
			cout << "Seleccion el tipo de habitacion que desea: ";
				cin >> room;
			
			if(room == 1){
				tipo = "Deluxe";
			}else if(room = 2){
				tipo = "Estandar";
			}
			
			return tipo;
		}
		
		///Este metodo lo usara el turista 
		double solicitarPrecioHabitacion(string tipo, string precio2){
			double precio;
			double total;
			string opcion;
			int cantidad;
			double total2;
			precio = atoi(precio2.c_str());
			cout << "\nEl tipo de habitacion que se escogio fue: "<< tipo << endl;
			cout << "El precio es: " << precio2;
			///cout >> precio2;
			
			
			if(tipo == "Deluxe"){
				cout << "\nDesea seleccionar el paquete todo incluido?(Si/No): ";
				cin >> opcion;
				if(opcion == "Si" || opcion == "si" ){
					total = (precio * 0.4)+ precio;
					return total;
				}else if(opcion == "No" || opcion == "no"){
					total = total + precio;
					return total;
				}
				
			} else if( tipo == "Estandar"){
				cout << "Desea seleccionar el paquete todo incluido?(Si/No): ";
				cin >> opcion;
				if(opcion == "Si" || opcion == "si" ){
					total = (precio * 0.4)+ precio;
					return total;
				}else if(opcion == "No" || opcion == "no"){
					
					total = total + precio;
					return total;
				}
				
			}
			
				
		}
		//Ingresara personas --Turista	
		double ingresarPersonas(double total){ //
			
			int repetir;
			int cantidad;
			double total2;
			
				do{
				
					cout << "Ingrese la cantidad de personas(Maximo 3): ";
					cin >> cantidad;
					if(cantidad == 1) return total;
					if(cantidad == 2) return total;
					if(cantidad == 3) {
						total2 = (total * 0.3)+ total;
						return total2;
						//break;
					}
					if(cantidad >= 4 && cantidad <= 99){
						cout << "No se puede agregar mas de 3 personas!\nVuelva ingresar la cantidad" << endl;
						repetir = 1;
					}
					
				}while(repetir == 1);
			
			
		}
		
		///solicitara nombre de hotel o cabina
		string solicitarNombre(){
			string nombre;
			cout << "Ingrese el nombre: ";
			getline(cin,nombre);
			
			return nombre;
		}
		
		///Este metodo lo usara el administrador para registrar las habitaciones del hotel
		string RegistrarHabitaciones(){
			string habitacion = "";
			int opcion;
			cout << "Ingrese el tipo de habitacion que ofrece el hotel: " << endl;
			cout << "1) Deluxe\n2) Estandar\n3) Ambas";
			cout << endl;
			cin >> opcion;
			
			
			if(opcion == 1){
				habitacion = habitacion + "Deluxe";
			}
			if(opcion == 2){
				habitacion = habitacion + "Estandar";
			}
			if(opcion == 3){
				habitacion = "Deluxe y Estandar";
			}
			
			return habitacion;
			
		}
		
		//Metodos del hotel
		string RegistrarAlimentacion(){
			string habitacion = "";
			int opcion;
			cout << "Ingrese el tipo de alimentacion que ofrece el hotel: " << endl;
			cout << "1) Desayuno\n2) Todo incluido\n3) Ambas";
			cout << endl;
			cin >> opcion;
			
			
			if(opcion == 1){
				habitacion = habitacion + "Desayuno";
			}
			if(opcion == 2){
				habitacion = habitacion + "Todo incluido";
			}
			if(opcion == 3){
				habitacion = "Desayuno/Todo incluido";
			}
			
			return habitacion;
			
		}
		
		//Método para el hotel
		///paso el precio normal
		//si establezco el precio1 ese precio puedo acceder 
		//porque ese precio va necesitar el turista
		//por lo tanto ese valor lo voy a pasar
		//por parametro al metodo SOLICITARPRECIOHABITACION
		string RegistrarPreciosHabitacion(string precio1){
			
			string precios = "Tarifa normal " + precio1 + " por noche si son 2 personas/Si selecciona Todo incluido en alimentacion se cobra 40% mas sobre la tarifa normal/Si son 3 personas 30% mas sobre la tarifa normal";
			
			return precios;
		}
		
		///Este método lo usara el hotel
		string RegistrarTiposDeAlimentacion(){
			string tipo_alimentacion = "";
			int opcion;
			cout << "Ingrese el tipo de alimentacion que ofrece el hotel: " << endl;
			cout << "1) Todo incluido\n2) Desayuno\n3) Ambos";
			cout << endl;
			cin >> opcion;
			
			
			if(opcion == 1){
				tipo_alimentacion = tipo_alimentacion + "Todo incluido";
			}
			if(opcion == 2){
				tipo_alimentacion = tipo_alimentacion + "Desayuno";
			}
			if(opcion == 3){
				tipo_alimentacion = "Todo incluido y desayuno";
			}
			
			return tipo_alimentacion;
			
		}
		
		///Metodo para registrar habitaciones dependiendo de lo que ofrezca la cabina 
		string RegistrarHabitacionesCabina(){
			
			string tipo_habitacion = "";
			int opcion;
			cout << "Ingrese el tipo de habitacion que ofrece la cabina: " << endl;
			cout << "1) Extra grande\n2) Familiar\n3) Pareja\n4) Todas las anteriores";
			cout << endl;
			cin >> opcion;
			
			
			if(opcion == 1){
				tipo_habitacion = "Extra grande";
			}
			if(opcion == 2){
				tipo_habitacion = "Familiar";
			}
			if(opcion == 3){
				tipo_habitacion = "Pareja";
			}
			if(opcion == 4){
				tipo_habitacion = "Extra grande/Familiar/Pareja";
			}
			
			return tipo_habitacion;///habitacion cabina
		}
		
		///Metodo para ingresar precios de habitaciones de cabina dependiendo de cual tipo
		//ofrezca
		double PrecioCabinas(string tipo){
			
			double precio;
			if(tipo == "Extra grande"){
				cout << "Ingrese el precio: ";
				cin >> precio;
				return precio;
			}else if(tipo == "Familiar"){
				cout << "Ingrese el precio: ";
				cin >> precio;
				return precio;
			}else if(tipo == "Pareja"){
				cout << "Ingrese precio: ";
				cin >> precio;
				return precio;
			}
			
		}
	
		///este método será necesario para ingresar al sistema
		bool Login(){
			
			string password;
			char c;
			
			string line = " ";
			ifstream readFile("Permisos.txt");
			char ch;
			string usuario;
			
			string _usuario;
			string _Password;
			string _tipo;

			cout << "Ingrese el usuario: ";
			cin >> usuario;

			cout << "Ingrese la contraseña: ";
			
			do{ //Se va repetir hasta que se presione Enter
         		c = getch();
         		switch(c){
            		case 0:{
               			getch();
               			break;
               		}
            		case '\b':{
               			if(password.size() != 0){ //Si la cadena tiene datos, se borra el ultimo caracter
                  		cout << "\b \b";
                  		password.erase(password.size() - 1, 1);
                  		}
               		break;       
               		}   
            		default:{
               			if(isalnum(c) || ispunct(c)){ ///Imprime los asteriscos
                  		password += c;
                  		cout << "*";           
                  		}
               			break;     
               		}      
            	};
         	}while(c != '\r');
      
      		bool found = false; //
			while (getline(readFile,line)) { //lee el archivo
			//cout << endl;
		//	cout << "Linea: " << line << "\n";
    		stringstream iss(line); //recibe la linea y la guarda en un "buffer" temporal
    		iss >> _usuario >> _Password >> _tipo; //lee traspaso el contenido de las lineas a las variables
    		cout << "tipo es: " << _tipo << endl;
    	
			cout << "\n"<<iss.str();
    			if (usuario == _usuario && password == _Password && _tipo == "administrador") { //las compara
        		cout << "\nInicio de sesion exitoso!"<< endl;
        		found = true;
       		 	break;
    			}
			}

				if (!found) {
   				 cout << "\n\nUsuario o contraseña invalidos"<< endl;
				}
			cout << endl;	
			system("pause");
			system("cls");	
				
			return found;
		}
		
		//Método que solicitará a hotel o cabina
		string solicitarUbicacion(){
			string ubicacion;
			cout << "Ingrese la ubicacion: ";
			
			getline(cin,ubicacion);
			getline(cin,ubicacion);
			return ubicacion;
		}
		
		///Método que solicitará a cabina el telefono
		int solicitarTelefono(){
			int a;
			cout << "Ingrese el numero de telefono: ";
			cin >> a;
			
			return a;
		}
		
		//Método que solicita la cedula juridica
		string solicitarCedulaJuridica(){
			string c_d;
			cout << "Ingrese cedula juridica: ";
			getline(cin,c_d);
			
			return c_d;
		}
		
		//Método que solicita responsable
		string solicitarResponsable(){
			string persona;
			cout << "Ingrese el responsable legal: ";
			getline(cin,persona);
			
			return persona;
		}
		
		//Metodo  que solicita la cantidad de habitaciones
		string solicitarCantidadHabitaciones(){
			string cantidad;
			cout << "Ingrese la cantidad de habitaciones: ";
			cin >> cantidad;
			
			return cantidad;
		}
		
		//Método que solicita el tipo de alimentacion
		string solicitarTipoAlimentacion(){
			string tipo;
			cout << "Ingrese el tipo de alimentacion que ofrece: ";
			getline(cin,tipo);
			getline(cin,tipo);
			
			return tipo;
		}
		
		//Método que solicita precio
		string solicitarPrecio(){
			string precio;
			cout << "Ingrese el precio de habitacion por noche: ";
			cin >> precio;
			
			return precio;
		}
		
		//Generar password
		string GenerarPassword(){
		 
		 int longitud = 5;
   		 srand(time(0));
  		 string str = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
   		 int pos;
  		 while(str.size() != longitud) {
    	 pos = ((rand() % (str.size() - 1)));
         str.erase (pos, 1);
   		}
   		
		return str;
		}
		
		//obtiene el password
		string ObtenerPassword(string pass){
			return pass;
		}
		
		///obtiene la cantidad de hoteles registrados
		void ObtenerTotalHoteles(){
			
			string line;
  			ifstream mifichero ("ContadorHoteles.txt");
   			int total=0;
  
  			if (mifichero.is_open()){
    			while (! mifichero.eof() ){
      			getline (mifichero,line);
       			total=total+atoi(line.c_str());
    			}
    			mifichero.close();
  			}
  			
  			cout << "La cantidad de hoteles: " << total << "\n\n";
		}
		
		//obtiene la cantidad de cabinas registrados
		void ObtenerTotalCabinas(){
			
			string line;
  			ifstream mifichero ("ContadorCabinas.txt");
   			int total=0;
  
  			if (mifichero.is_open()){
    			while (! mifichero.eof() ){
      			getline (mifichero,line);
       			total=total+atoi(line.c_str());
    			}
    			mifichero.close();
  			}
  			
  			cout << "La cantidad de cabinas registradas es: " << total << "\n\n";
		}
		
		
		
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
						GenerarMenu();
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
						GenerarMenu();
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
						GenerarMenu();
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
						GenerarMenu();
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
					string line;
  					ifstream mifichero ("ContadorReservas.txt");
   					int total=0;
  
  					if (mifichero.is_open()){
    				while (! mifichero.eof() ){
      				getline (mifichero,line);
       					total=total+atoi(line.c_str());
    				}
    				mifichero.close();
  				}
  			
  					cout << "La cantidad total de reserva: " << total << "\n\n";	
					
					
					
					break;
				}	
			
			}//switch 	
		}
		
		//Genera menu con todas las opciones
		void GenerarMenu(){
	
			int opcion;
			Interfaz menu;
			cout << "--------------------------------------------------------------------------------\n";
			cout << "\tBienvenido al sistema de reservas y gestion de paquetes turisticos\n\t\tPara iniciar sesion seleccione la opcion deseada.";
			cout << "\n\n--------------------------------------------------------------------------------\n";
			cout << "1) Administrador\t\n2) Empresario\t\n3) Usuario\n4) Salir";
			cout << "\n\n--------------------------------------------------------------------------------\n";
			cout << "Opcion: ";
			cin >> opcion;
	
			//ADMINISTRADOR
			if(opcion == 1){
				Interfaz menu;;
				bool acceso;
				acceso = menu.Login(); /// devuelve un valor booleano
				if(acceso == false){ // si es falsa, vuelve a ingresar al menu
				int opcion;
				cout << "Presione 1 para volver al menu: ";
				cin >> opcion;
				system("cls");
					if(opcion == 1){
					GenerarMenu();	
					}
				}
		
			else if(acceso == true){ // si es verdadero, entra a la opcion
			
				menu.GenerarMenuAdministrador();
			
			}
		}
		
			//EMPRESARIO
			if(opcion == 2){
			bool acceso;
			acceso = menu.Login();
			if(acceso == false){
			int opcion;
			cout << "Presione 1 para volver al menú: ";
			cin >> opcion;
			system("cls");
			if(opcion == 1){
				GenerarMenu();	
				
			}
		}
		
		if( acceso == true){
			int opcion;
			
			cout << "Bienvenido a las opciones de empresario!\n\n" << endl;
			cout << "Ingrese la opcion que desee: \n"; 
			cout << "1)Mostrar total de reservas realizadas para el hotel o cabina\n2)Totalidad de reservas para un mes en especifico\n3)Mostrar detalle de una reservacion realizada\n\n ";
			cout << "Opcion: "; cin >> opcion;
	
		}
		
		
	}
		
			//USUARIO
			if(opcion == 3){
		
			system("cls");
			int opcion;
			
			cout << "Bienvenido a las opciones de turista!\n\n" << endl;
			cout << "Ingrese la opcion que desee: \n"; 
			cout << "1)Mostrar opciones hoteleras\n2)Mostrar opciones de cabinas\n3)Seleccionar hotel o cabina deseado\n\n ";
			cout << "Opcion: "; cin >> opcion;
			
			switch(opcion){
				//MOSTRAR OPCIONES HOTELERAS
				case 1:{
					ifstream archivo;
					string linea;
					archivo.open("InformacionDeHoteles.txt");
					system("cls");
					cout << "Opciones de Hoteles\n\n";
					cout << "Hotel|Ubic|C.Juridica|ResponsableLegal|Habitaciones|Alimentacion|Precios\n";
					if(archivo.is_open()){
						while(getline(archivo,linea)){
							string contenido;
							contenido = contenido + linea + "\n";
							cout << contenido << endl;
						}
					}
					break;
				}
				//MOSTRAR OPCIONES CABINAS
				case 2:{
					///mostrar cabinas
					ifstream archivo;
					string linea;
					archivo.open("InformacionDeCabinas.txt");
					system("cls");
					cout << "Opciones de Cabinas\n\n";
					cout << "Cabina|Ubic|C.Juridica|ResponsableLegal|Habitaciones|Tel|N.Habitacion|Precios\n";
					if(archivo.is_open()){
						while(getline(archivo,linea)){
							string contenido;
							contenido = contenido + linea + "\n";
							cout << contenido << endl;
						}
					}
					
					break;
				}
				//SELECCIONAR HOTEL O CABINA SEGUN OPCIONES
				case 3:{
					
					string nombre;
					ofstream archivo;
					int opcion;
					int contadorReservas = 0;
					string servicio;
					cout << "En que desea reservar(Escriba cabina o hotel): \n";
					getline(cin,servicio);
					getline(cin,servicio);
					
					///SI ES CABINA
					if(servicio == "Cabina" || servicio == "cabina"){
							
					cout << "Ingrese el nombre de la cabina que desea solicitar: ";
					getline(cin,nombre);
					getline(cin,nombre);
					string n_archivo = nombre+".txt";
					cout << n_archivo;
					archivo.open(n_archivo.c_str(),ios::in);
					if(archivo.is_open()){
						cout << "Registro de cabina encontrado";
					}else{
						cout << "Archivo no encontrado!";
						system("pause");
						system("cls");
						GenerarMenu();
					}
				
					
					////PREGUNTA SI DESEA HACER RESERVA
					cout << "\nDesea hacer reserva?(1-Si/2-No): ";
					cin >> opcion;
					if(opcion == 1){
						
						//++contadorReservas;
						Cabina c;
						string nombre;
						string apellido;
						string cedula;
						string correo;
						string telefono;
						int diaEntrada,diaSalida, mesEntrada, mesSalida, anio1, anio2;
						
						system("cls");
						///Ingreso de informacion
						cout << endl;
						system("cls");
						cout << "Ingrese su nombre: ";
						getline(cin,nombre);
						getline(cin,nombre);
						cout << "Ingrese el apellido: ";
						getline(cin,apellido);
						cout << "Ingrese la cedula: ";
						getline(cin,cedula);
						cout << "Ingrese el correo: ";
						getline(cin,correo);
						cout << "Ingrese telefono: ";
						getline(cin, telefono);
						c.setTipoHabitacion(IngresarTipoHabitacionEnCabina());
						
						cout << endl;
						c.setCantidadPersonas(ingresarPersonasCabina(c.getTipoHabitacion()));
						cout << "Ingrese el dia de entrada: ";
						cin >> diaEntrada;
						cout << "Ingrese el mes de entrada: ";
						cin >> mesEntrada;
						cout << "Ingrese el anio: ";
						cin >> anio1;
						cout << "Ingrese el dia de salida: ";
						cin >> diaSalida;
						cout << "Ingrese el mes de salida: ";
						cin >> mesSalida;
						cout << "Ingrese el anio: ";
						cin >> anio2; 
						
						//Establece las fechas
						tm tm1 = make_tm(anio2,mesSalida,diaSalida);    
						tm tm2 = make_tm(anio1,mesEntrada,diaEntrada);    
						
						//
						
						//Valores del tiempo aritmeticos
						//En una posicion del sistema, estos son segundos
						time_t time1 = mktime(&tm1);
						time_t time2 = mktime(&tm2);
						
						//Total de segundos por dias y la diferencia total de dias
						const int segundos_por_dia = 60*60*24;
						time_t difference = (time1 - time2) / segundos_por_dia;
						
						cout << "La cantidad de noches son: " << difference;
						
						archivo << nombre << "|" << apellido << "|" << cedula << "|" << correo << "|" << telefono << "|" << c.getTipoHabitacion()<< "|" << diaEntrada<<"/"<<mesEntrada<<"/"<<anio1 << "|" << diaSalida<<"/"<<mesSalida<<"/"<<anio2 << "|" << difference << "\n";
						archivo.close();
						
						///Cuenta la cantidad de reservas hechas
						++contadorReservas;
						ofstream r;
						r.open("ContadorReservas.txt",ios::out | ios::app);
						r << contadorReservas << "\n"; //guarda la cantidad "1" en el fichero
						r.close();
						
						//Pasa informacion a la factura
						//Factura(nombre,apellido,cedula,correo,telefono,c.getTipoHabitacion(),mesEntrada,diaEntrada,anio1,mesSalida,diaSalida,anio2,difference);
						//Cuenta las reservas en un mes especifico y guarda
						contarReservasEnMes(mesEntrada);
						break;
						
					}
			} //CABINA
			
					if(servicio == "Hotel" || servicio == "hotel"){
						
						cout << "Ingrese el nombre del hotel que desea solicitar: ";
						getline(cin,nombre);
						
						string n_archivo = nombre+".txt";
						cout << n_archivo;
						archivo.open(n_archivo.c_str(),ios::in);
						if(archivo.is_open()){
						cout << "Registro de cabina o hotel encontrado";
						}else{
						cout << "Archivo no encontrado!";
						system("pause");
						system("cls");
						GenerarMenu();
					}
				
					
					
					cout << "\nDesea hacer reserva?(1-Si/2-No): ";
					cin >> opcion;
					if(opcion == 1){
						
						//++contadorReservas;
						Hotel n;
						string nombre;
						string apellido;
						string cedula;
						string correo;
						string telefono;
						string precio;
						int diaEntrada,diaSalida, mesEntrada, mesSalida, anio1, anio2;
						
						system("cls");
						///Ingreso de informacion
						cout << endl;
						system("cls");
						cout << "Ingrese su nombre: ";
						getline(cin,nombre);
						getline(cin,nombre);
						cout << "Ingrese el apellido: ";
						getline(cin,apellido);
						cout << "Ingrese la cedula: ";
						getline(cin,cedula);
						cout << "Ingrese el correo: ";
						getline(cin,correo);
						cout << "Ingrese telefono: ";
						getline(cin, telefono);
						n.setHabitacion(solicitarHabitacionHotel());
						cout << endl;
						cout << "Ingrese el precio de la habitacion segun la tarifa del hotel: ";
						getline(cin,precio);
						getline(cin,precio);
						n.setPrecio2(solicitarPrecioHabitacion(n.getHabitacion(),precio));
						ingresarPersonas(n.getPrecio2());
						cout << "Ingrese el dia de entrada: ";
						cin >> diaEntrada;
						cout << "Ingrese el mes de entrada: ";
						cin >> mesEntrada;
						cout << "Ingrese el anio: ";
						cin >> anio1;
						cout << "Ingrese el dia de salida: ";
						cin >> diaSalida;
						cout << "Ingrese el mes de salida: ";
						cin >> mesSalida;
						cout << "Ingrese el anio: ";
						cin >> anio2; 
						
						//Establece las fechas
						tm tm1 = make_tm(anio2,mesSalida,diaSalida);    
						tm tm2 = make_tm(anio1,mesEntrada,diaEntrada);    
						
						//
						
						//Valores del tiempo aritmeticos
						//En una posicion del sistema, estos son segundos
						time_t time1 = mktime(&tm1);
						time_t time2 = mktime(&tm2);
						
						//Total de segundos por dias y la diferencia total de dias
						const int segundos_por_dia = 60*60*24;
						time_t difference = (time1 - time2) / segundos_por_dia;
						
						cout << "La cantidad de noches son: " << difference;
						
						archivo << nombre << "|" << apellido << "|" << cedula << "|" << correo << "|" << telefono << "|" << n.getHabitacion() << "|" << diaEntrada<<"/"<<mesEntrada<<"/"<<anio1 << "|" << diaSalida<<"/"<<mesSalida<<"/"<<anio2 << "|" << difference << "|" << difference*n.getPrecio2() << "\n";
						archivo.close();
						
						///Cuenta la cantidad de reservas hechas
						++contadorReservas;
						ofstream r;
						r.open("ContadorReservas.txt",ios::out | ios::app);
						r << contadorReservas << "\n"; //guarda la cantidad "1" en el fichero
						r.close();
						
						//PASA INFORMACION A LA FACTURA
						Factura(nombre,apellido,cedula,correo,telefono,n.getHabitacion(),mesEntrada,diaEntrada,anio1,mesSalida,diaSalida,anio2,difference,n.getPrecio2());
						//Cuenta las reservas en un mes especifico y guarda
						contarReservasEnMes(mesEntrada);
						break;
					}
					
							
					} else if(opcion == 2){
						system("cls");
						GenerarMenu();
					}
				}
					
			}//SWITCH
					
					
			} //OPCION 3  USUARIO
		
			//SALIR
			if(opcion == 4){
					cout << "Gracias por usar el sistema.";
					exit(0);
				}
			cout << "------------------------------------------\n";
		
		} //GENERAR MENU
				
				
		int contarReservasEnMes(int month){
			int contador = 0;
			switch(month){
				case 1:{
					
					++contador;
					ofstream enero("Enero.txt");
					enero.open("Enero.txt",ios::out | ios::app);
					enero << contador << "\n"; //guarda la cantidad "1" en el fichero
					
					break;
				} 
				
				case 2:{
					++contador;
					ofstream feb;
					feb.open("Febrero.txt",ios::out | ios::app);
					feb << contador << "\n"; //guarda la cantidad "1" en el fichero
					break;
				}
				
				case 3:{
					++contador;
					ofstream marzo;
					marzo.open("Marzo.txt",ios::out | ios::app);
					marzo << contador << "\n"; //guarda la cantidad "1" en el fichero
					break;
				}
				case 4:{
					++contador;
					ofstream abril;
					abril.open("Abril.txt",ios::out | ios::app);
					abril << contador << "\n"; //guarda la cantidad "1" en el fichero
					break;
				}
				case 5:{
					++contador;
					ofstream mayo;
					mayo.open("Mayo.txt",ios::out | ios::app);
					mayo << contador << "\n"; //guarda la cantidad "1" en el fichero
					break;
				}
				case 6:{
					++contador;
					ofstream junio;
					junio.open("Junio.txt",ios::out | ios::app);
					junio << contador << "\n"; //guarda la cantidad "1" en el fichero
					break;
				}
				case 7:{
					++contador;
					ofstream julio;
					julio.open("Julio.txt",ios::out | ios::app);
					julio << contador << "\n"; //guarda la cantidad "1" en el fichero
					break;
				}
				case 8:{
					++contador;
					ofstream agost;
					agost.open("Agosto.txt",ios::out | ios::app);
					agost << contador << "\n"; //guarda la cantidad "1" en el fichero
					break;
				}
				case 9:{
					++contador;
					ofstream sep;
					sep.open("Septiembre.txt",ios::out | ios::app);
					sep << contador << "\n"; //guarda la cantidad "1" en el fichero
					break;
				}
				case 10:{
					++contador;
					ofstream oct;
					oct.open("Octubre.txt",ios::out | ios::app);
					oct << contador << "\n"; //guarda la cantidad "1" en el fichero
					break;
				}
				case 11:{
					++contador;
					ofstream nov;
					nov.open("Noviembre.txt",ios::out | ios::app);
					nov << contador << "\n"; //guarda la cantidad "1" en el fichero
					break;
				}
				case 12:{
					++contador;
					ofstream diciembre;
					diciembre.open("Diciembre.txt",ios::out | ios::app);
					diciembre << contador << "\n"; //guarda la cantidad "1" en el fichero
					break;
				}
			}			
		}

		void Factura(string nombre, string apellido, string cedula, string correo, string telefono, string habitacion, int mes1, int dia1, int anio1, int mes2, int dia2, int anio2, time_t diferencia, double precio){
			
			cout << "\t\t\tFactura\n\n";
			cout << "Nombre: " << nombre << endl;
			cout << "Apellido: " << apellido << endl;
			cout << "Cedula: " << cedula << endl;
			cout << "Correo: " << correo << endl;
			cout << "Telefono: " << telefono << endl;
			cout << "Habitacion: " << habitacion << endl;
			cout << "Fecha de entrada: " << dia1<<"-"<<mes1<<"-"<<anio1 << endl;
			cout << "Fecha de salida: " << dia2<<"-"<<mes2<<"-"<<anio2 << endl;
			cout << "Cantidad de noches: " << diferencia << endl;
			cout << "Precio total: " << diferencia*precio << endl;
			
		}

		//Metodo que usara el turista para seleccionar la habitacion cabina
		string IngresarTipoHabitacionEnCabina(){
			
			string tipo;
			
			int opc;
			cout << "Ingrese el tipo de habitacion que desea en la cabina: \n";
			cout << "1) Extra Grande\n2) Familiar \n3) Pareja\n";
			cin >> opc;
			
			if(opc == 1){
				tipo = "Extra grande";
				return tipo;
			}
			if(opc == 2){
				tipo = "Familiar";
				return tipo;
			}
			if(opc == 3){
				tipo = "Pareja";
				return tipo;
			}
			
		}
		
		///El turista ingresará el numero de personas en la habitacion que escogio
		int ingresarPersonasCabina(string tipo){
			
			int repetir;
			int cantidad;
			double total2;
			
				do{
				
					
					if(tipo == "Extra grande"){
						cout << "Ingrese la cantidad de personas(Maximo 8): ";
						cin >> cantidad;
						return cantidad;
						if(cantidad > 8){
							cout << "No está permitido mas de 8 personas\nVuelva ingresar la cantidad";
							repetir = 1;
						}
						
					} 
					else if(tipo == "Familiar"){
						cout << "Ingrese la cantidad de personas(Maximo 4): ";
						cin >> cantidad;
						return cantidad;
						if(cantidad > 4){
							cout << "No está permitido mas de 4 personas\nVuelva ingresar la cantidad";
							repetir = 1;
						}	
					} 
					else if(tipo == "Pareja") {
						cout << "Ingrese la cantidad de personas(Maximo 2): ";
						cin >> cantidad;
						return cantidad;
						if(cantidad > 2){
							cout << "No está permitido mas de 2 personas\nVuelva ingresar la cantidad";
							repetir = 1;
						}
					}
					
					
				}while(repetir == 1);
			
			
		}	
};
