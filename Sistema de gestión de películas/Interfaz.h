class Interfaz{
	public:
		/*MÉTODO QUE BUSCA UN ELEMENTO DEL VECTOR
		@param vector<T> &arreglo: recibe un vector con objetos	
		@param T &dato: recibe un objeto de la clase
		@return devuelve NULL si no existe, devuelve la posicion i del objeto en el arreglo
		Funcion: Al recibir el vector y el objeto, recorre el vector y verifica que si el objeto pasado
		por referencia es igual al del arreglo, lo devuelve.
		*/
		template <class T>
		T* vector_buscar (vector<T> &arreglo, const T &dato){
    		int i, n=arreglo.size();
    			for (i=0; i<n; i++)
       	 			if (dato==arreglo[i])
            return &arreglo[i];
    		return NULL;
		}
		
		/*MÉTODO QUE IMPRIME PELICULA
		@param Pelicula &movie: recibe un objeto de la clase pelicula
		
		Funcion: Recibe el parametro e imprime las caracteristicas de la pelicula
		*/
		 void imprimir (Pelicula &movie){
	        cout << "\nInformacion de la pelicula\n\n";
	        cout << "Nombre: " << movie.nombre.c_str() << endl;
	        cout << "Genero: " << movie.genero << endl;
	        cout << "Director: " << movie.director << endl;
	        cout << "Actores: " << movie.actores << endl;
	        cout << "Cantidad en stock: " << movie.cantidad<< endl;
	        cout << "Numero de ventas: " << movie.ventas << endl;
	        cout << endl;
       }
       /*MÉTODO QUE IMPRIME JUEGO
		@param Juego &game: recibe un objeto de la clase pelicula
		
		Funcion: Recibe el parametro e imprime las caracteristicas del juego
		*/
       
        void imprimirJuego (Juego &game){
        	cout << "-----------------------------------------";
	        cout << "\nInformacion del juego\n\n";
	        cout << "Nombre: " << game.getNombre() << endl;
	        cout << "-----------------------------------------";
	        
	        cout << endl;
       }
	
		/*MÉTODO QUE SOLICITA REFERENCIA
		@return referencia
		
		Funcion: Ingresa referencia segun usuario
		*/	
		string solicitarReferencia(){
			string x;
			cout << "Ingrese numero de referencia: ";
			cin >> x;
			return x;
		}
		
		/*MÉTODO QUE SOLICITA OPCION
		@return op
		
		Funcion: Ingresa opcion segun usuario
		*/	
		int leerOpcion(){
			int op;
			cout << "Ingrese la opcion deseada: ";
			cin >> op;
			return op;
		}
		
		/*MÉTODO QUE SOLICITA NOMBRE
		@return name
		
		Funcion: Ingresa nombre segun usuario
		*/	
		string ingresarNombre(){
			string name;
			cout << "Ingrese el nombre: ";
			getline(cin,name);
			getline(cin,name);
			return name;
		}
		
		/*MÉTODO QUE SOLICITA DIRECTOR
		@return director
		
		Funcion: Ingresa direccion segun usuario
		*/	
		string ingresarDirector(){
			string director;
			cout << "Ingrese el director de la pelicula: ";
			getline(cin,director);
			return director;
		}
		
		/*MÉTODO QUE SOLICITA ACTOR
		@return actor
		
		Funcion: Ingresa actor segun usuario
		*/	
		string ingresarActor(){
			string actor;
			cout << "Ingrese los actores de la pelicula: ";
			getline(cin,actor);
			return actor;
		}
		
		/*MÉTODO QUE SOLICITA CANTIDAD DE PELICULAS EN STOCK
		@return cant
		
		Funcion: Ingresa cantidad segun usuario
		*/	
		
		int ingresarCantidad(){
			int cant;
			cout << "Ingrese la cantidad de copias disponibles: ";
			cin >> cant;
			return cant;
		}
		
		/*MÉTODO QUE SOLICITA GENERO
		@return gen
		
		Funcion: Ingresa genero segun usuario
		*/	
		string ingresarGenero(){
			string gen;
			cout << "Ingrese el genero de la pelicula: ";
			getline(cin,gen);
			return gen;
		}
		
		/*MÉTODO QUE MUESTRA UN LOGIN AL SISTEMA
		@return true
		
		Funcion: Verifica si el usuario y password establecidos son iguales a lo establecido por el usuario, si es igual devuelve true
		sino, llama recursivamente al metodo otra vez para ingresar los datos
		*/	
		
		bool Login(){
			/*NOTA: EN CASO DE NO FUNCIONAR EL GETCH, BORRAR EL CICLO DO Y HABILITAR EL CIN >> PASS Y INGRESAR LA CONTRASEÑA NORMALMENTE
			YA QUE LA LIBRERIA CONIO SUELE DAR PROBLEMAS EN DIFERENTES ENTORNOS DE DESARROLLO*/
			/*EL CICLO GENERA LOS ASTERISCOS QUE NORMALMENTE SE VEN CUANDO SE ESCRIBE UN PASSWORD*/
			string usuario, pass;
			char c;
			cout << "PARA INGRESAR AL SISTEMA INGRESE USUARIO Y PASSWORD.\n\n";
			cout << "Ingrese el nombre de usuario: ";
			cin >> usuario;
			cout << "Ingrese el password: ";
			//cin >> pass;
			
			do{ //Se va repetir hasta que se presione Enter
         		c = getch();
         		switch(c){
            		case 0:{
               			getch();
               			break;
               		}
            		case '\b':{
               			if(pass.size() != 0){ //Si la cadena tiene datos, se borra el ultimo caracter
                  		cout << "\b \b";
                  		pass.erase(pass.size() - 1, 1);
                  		}
               		break;       
               		}   
            		default:{
               			if(isalnum(c) || ispunct(c)){ ///Imprime los asteriscos
                  		pass += c;
                  		cout << "*";           
                  		}
               			break;     
               		}      
            	}//switch
         	}while(c != '\r');
			
			if(usuario == "admin" && pass == "video7529"){
				cout << "\a";
				return true;
			}else{
				cout << "\nUsuario o contraseña invalidos!\n";
				cout << "Vuelva a ingresar datos!\n\n\n";
				for(int i = 1; i <= 5;i++){
					system("cls");
					
					cout << "Sera redirigido al login en: "<< i;
					
					Sleep(1000);
				}
				
				
				system("cls");
				
				Login();
			}
			
			
		}
		
		/*ESTE METODO RESTABLECE DATOS DE UN OBJETO PELICULA
		@param Pelicula *p: Recibe un puntero de un objeto pelicula
		Funcion: Recibe el puntero que apunta a pelicula y lo setea*/
		
		void vaciar(Pelicula *p){
			string cant,ref,vent;
			stringstream s1,s2,s3;
			int c,r,v;
			stringstream convert; // stringstream used for the conversion initialized with the contents of Text
			
			s1 << p->getCantidad();
			s2 << p->getVentas();
			s3 << p->getReferencia();
			cant = s1.str();
			ref = s2.str();
			vent = s3.str();
			cant = " ";
			ref = " ";
			vent = " ";
			c = atoi(cant.c_str());
			r = atoi(ref.c_str());
			v = atoi(vent.c_str());
			p->nombre = "";
			p->cantidad = c;
			p->director ="";
			p->genero="";
			p->setReferencia("");
			p->ventas=v;
		}
		
		/*Este metodo guardara una pelicula en el vector
		Parametros que recibe:
		-Pelicula a(Pelicula que se guardara)
		-Pelicula *puntero(Puntero que guardara la pelicula cuando se proceda a buscar en el vector)
		-vector<Pelicula> array(Vector que guarda las peliculas)
		Funcion:
		Guardar la pelicula por referencia segun el numero que ingrese el usuario, si la pelicula
		existe, no se guarda, sino empieza a ingresar datos
		Retorno:
		-Pelicula con todos los datos
		*/
		Pelicula ingresarPelicula(Pelicula a,Pelicula *puntero, vector<Pelicula> array){
			system("cls");
				cout << "**AGREGAR PELICULA**\nReferencia = numero donde se guardara pelicula.\n\n\n";
				Interfaz in;
				a.setReferencia(in.solicitarReferencia());
				puntero = vector_buscar(array, a);
				if(puntero != NULL){
					
					cout << "Registro existente";
					vaciar(puntero);
					return *puntero;
					
					
						
				}else {
					
					cout << endl << "\nNo se encontro pelicula en la base de datos.\n\n\nIngrese los datos:\n\n";
					a.setNombre(in.ingresarNombre());
					a.setGenero(in.ingresarGenero());
					a.setDirector(in.ingresarDirector());
					a.setActores(in.ingresarActor());
					a.setCantidad(in.ingresarCantidad());
					
					//array.push_back(a);
					
				}
				return a;
            	
				
			
		}
		
		/*Este metodo consultara una pelicula que se halle guardada en el vector
		Paremetros que recibe:
		-Pelicula a(Pelicula que se halle guardada)
		-Pelicula *puntero(Puntero que guardara la pelicula cuando se proceda a buscar en el vector
		-vector<Pelicula> array(Vector que guarda las peliculas)
		Funcion:
		Buscara la pelicula por referencia segun el numero que ingrese el usuario, si la pelicula
		existe, se procedera a imprimir, sino no muestra registro alguno
		*/
		void consultarPelicula(Pelicula a,Pelicula *puntero, vector<Pelicula> array){
				system("cls");
				cout << "**CONSULTAS**\n";
				cout << "Para ver la informacion total de alguna pelicula, \nde su numero de referencia segun catalogo.\n\n";
				Interfaz in;
				a.setReferencia(in.solicitarReferencia());
				puntero = in.vector_buscar(array, a);
				if(puntero != NULL){
				in.imprimir(*puntero);
				}
				
				else if (puntero==NULL)
            	cout << endl << "  No se encontro Registro.";
            	
		}
		
		/*ESTE METODO MODIFICA DATOS DE UN OBJETO PELICULA
		@param Pelicula *p: Recibe un puntero de un objeto pelicula
		@param opcion: Recibe opcion del usuario
		Funcion: Recibe el puntero que apunta a pelicula y lo setea*/
		void modificar(int opcion, Pelicula *p){
				Interfaz in;
				switch(opcion){
					case 1:
						p->setReferencia(in.solicitarReferencia());
					case 2:
						p->nombre = in.ingresarNombre();
					case 3:
						p->genero = in.ingresarGenero();
					case 4:
						p->director = in.ingresarDirector();
					case 5:
						p->actores = in.ingresarActor();
					case 6:
						p->cantidad = in.ingresarCantidad();
					
				}
		}
		
		/*MÉTODO QUE GUARDARA UN JUEGO 
		@param Juego a: Recibe el objeto juego
		@param Juego *puntero: Recibe un puntero de tipo juego que apuntara al juego especifico en en arreglo
		@param vector<Juego> array: Arreglo de tipo Juego
		@return *puntero: si no se encuentra en el arreglo, se restablecen valores y lo devuelve vacio
		@return a: Devuelve el juego con todos sus datos establecidos
		
		Funcion: Solicita un numero de referencia donde se guardara una pelicula, si existe, retorna puntero sin datos, ya que
		si de deja asi, el puntero lo devuelve con datos y se guarda en el vector, cosa que no debe ser asi, ya que el vector
		solo guarda objetos con sus respectivos datos. En caso contrario se procede a ingresar datos y retorna el juego
		contrario 
		*/	
		
		Juego ingresarJuego(Juego a,Juego *puntero, vector<Juego> array){
			system("cls");
				cout << "**AGREGAR JUEGO**\nReferencia = numero donde se guardara juego.\n\n\n";
				Interfaz in;
				a.setReferencia(in.solicitarReferencia());
				puntero = vector_buscar(array, a); ///busca en el vector
				if(puntero != NULL){ //si no existe
					
					cout << "Registro existente";
					vaciarJuegos(puntero);
					return *puntero;
					
					
						
				}else {
					
					cout << endl << "\nNo se encontro registro en la base de datos.\n\n\nIngrese los datos:\n\n";
					a.setNombre(in.ingresarNombre());
					
					
					//array.push_back(a);
					
				}
				return a;
            	
				
			
		}
		
		/*ESTE METODO RESTABLECE DATOS DE UN OBJETO JUEGO
		@param Juego *p: Recibe un puntero de un objeto pelicula
		Funcion: Recibe el puntero que apunta al juego y lo setea*/
		
		void vaciarJuegos(Juego *p){
			string cant,ref,vent;
			stringstream s1,s2,s3;
			int c,r,v;
			stringstream convert; // stringstream used for the conversion initialized with the contents of Text
			
			s1 << p->getNombre();
			s2 << p->getReferencia();
		
			cant = s1.str();
			ref = s2.str();
			vent = s3.str();
			cant = " ";
			ref = " ";
			vent = " ";
			c = atoi(cant.c_str());
			r = atoi(ref.c_str());
			v = atoi(vent.c_str());
			p->nombre = "";
			p->setReferencia("");
			
		}
		
		/*ESTE METODO MUESTRA DATOS DE UNA PELICULA
		@param Juego *puntero: Recibe un puntero de un objeto juego
		@param Juego a: Recibe un objeto de tipo juego
		@param vector <Juego> array: Recibe un vector de objetos juego
		
		Funcion: Busca el juego en el arreglo, si esta, imprime los datos del mismo,
		de lo contrario muestra que no existe*/
		
		void consultarJuego(Juego a,Juego *puntero, vector<Juego> array){
				system("cls");
				cout << "**CONSULTAS**\n";
				cout << "Para ver la informacion total de algun juego, \nde su numero de referencia segun catalogo.\n\n";
				Interfaz in;
				a.setReferencia(in.solicitarReferencia());
				puntero = in.vector_buscar(array, a);
				if(puntero != NULL){
				in.imprimirJuego(*puntero);
				}
				
				else if (puntero==NULL)
            	cout << endl << "  No se encontro Registro.";
            	
		}
		
		
		
		
};
