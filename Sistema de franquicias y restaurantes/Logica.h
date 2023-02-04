#include <iostream>
#include <fstream>
#include <sstream>
#include <string>
#include <vector>
#include <algorithm> 
using namespace std;

class Logica{
	
	public:
		Logica(){
		}
	
	string obtenerUsuario(string s){
        
          	transform(s.begin(), s.end(), s.begin(), ::tolower);
          	s.erase(remove(s.begin(), s.end(), ' '), s.end()); 
          	return s;
}

string obtenerPass(int edad, string usuario){

		ostringstream temp; 
		temp << edad;
		
		return usuario+temp.str();

 	
						 	
			 }


/*BUSCA INFORMACION DE UN ADMINISTRADOR SEGUN ID*/
vector<string> buscarAdmin(string id){
	
	ifstream data("administrador.txt");
	string aux = "";
	string record;
	while( !data.eof() ) {
			getline(data,record);
						
			if (record.find(id) != string::npos) {
		
				aux = record;
			} 

    }
                 
    stringstream ss( aux );
	vector<string> result;

	while( ss.good() ){
    	string substr;
    	getline( ss, substr, ',' );
    	result.push_back( substr );
	}
	
        return result;
	
}

/*BUSCA EN TXT LA FRANQUICIA SEGUN ID*/
vector<string> buscarFranquicia(string id){
	
	ifstream data("franquicia.txt");
	string aux = "";
	string record;
	while( !data.eof() ) {
			getline(data,record);
						
			if (record.find(id) != string::npos) {
		
				aux = record;
			} 

    }
                 
    stringstream ss( aux );
	vector<string> result;

	while( ss.good() ){
    	string substr;
    	getline( ss, substr, ',' );
    	result.push_back( substr );
	}

        return result;
	
}

/*OBTIENE SIGUIENTE ID SEGÚN LA ULTIMA DEL TXT EN USO*/
int obtenerSiguienteID(ifstream& in){
    string line;
    while (in >> ws && getline(in, line)) // skip empty lines
        ;
        
    stringstream ss1( line ); 
		 
		 vector<string> resultado1; // guardará los datos de la ultima linea
		 int siguienteId = 1000; //guardará el id siguiente de la franquicia
	
		//recorrer toda la linea y separar todo en partes para obtener el ultimo id
		while( ss1.good() ){
    		string substr;
    	    getline( ss1, substr, ',' );
    	    resultado1.push_back( substr );
		}	
		
		stringstream auxStringUltimoId(resultado1[0]); //guarda el ultimo id en buffer temporal
    	int auxUltimoId = 0; //auxiliar para convertir string a int del ultimo id
    	auxStringUltimoId >> auxUltimoId;  // se copia al buffer
		siguienteId = auxUltimoId+1; // se le suma 1 al ultimo id para dar con el si

    return siguienteId;
}

/*OBTIENE SIGUIENTE ID SEGÚN LA ULTIMA DEL TXT EN USO*/
int obtenerSiguienteIDRestaurante(ifstream& in){
    string line;
    while (in >> ws && getline(in, line)) // skip empty lines
        ;
        
    stringstream ss1( line ); 
		 
		 vector<string> resultado1; // guardará los datos de la ultima linea
		 int siguienteId = 100000; //guardará el id siguiente de la franquicia
		//cout << siguienteId << endl;
		//recorrer toda la linea y separar todo en partes para obtener el ultimo id
		while( ss1.good() ){
    		string substr;
    	    getline( ss1, substr, ',' );
    	    resultado1.push_back( substr );
		}	
		
		stringstream auxStringUltimoId(resultado1[0]); //guarda el ultimo id en buffer temporal
    	int auxUltimoId = 0; //auxiliar para convertir string a int del ultimo id
    	auxStringUltimoId >> auxUltimoId;  // se copia al buffer
    	
    	
    	if(auxUltimoId == 0){
    		auxUltimoId = 100000;
		}else{
			auxUltimoId = auxUltimoId+1;
			
		}
    //	cout << "ultimoid: "<< auxUltimoId << endl;
		
    return auxUltimoId;
}

/*OBTIENE SIGUIENTE ID SEGÚN LA ULTIMA DEL TXT EN USO*/
int obtenerSiguienteIdOrden(ifstream& in){
    string line;
    while (in >> ws && getline(in, line)) // skip empty lines
        ;
        
    stringstream ss1( line ); 
		 
		 vector<string> resultado1; // guardará los datos de la ultima linea
		 int siguienteId = 8000000; //guardará el id siguiente de la franquicia
		//cout << siguienteId << endl;
		//recorrer toda la linea y separar todo en partes para obtener el ultimo id
		while( ss1.good() ){
    		string substr;
    	    getline( ss1, substr, ',' );
    	    resultado1.push_back( substr );
		}	
		
		stringstream auxStringUltimoId(resultado1[0]); //guarda el ultimo id en buffer temporal
    	int auxUltimoId = 0; //auxiliar para convertir string a int del ultimo id
    	auxStringUltimoId >> auxUltimoId;  // se copia al buffer
    	
    	
    	if(auxUltimoId == 0){
    		auxUltimoId = 8000000;
		}else{
			auxUltimoId = auxUltimoId+1;
			
		}
    		
    return auxUltimoId;
}

/*OBTIENE SIGUIENTE ID SEGÚN LA ULTIMA DEL TXT EN USO*/
int obtenerSiguienteIdFactura(ifstream& in){
    string line;
    while (in >> ws && getline(in, line)) // skip empty lines
        ;
        
    stringstream ss1( line ); 
		 
		 vector<string> resultado1; // guardará los datos de la ultima linea
		 int siguienteId = 1000; //guardará el id siguiente de la franquicia
		//cout << siguienteId << endl;
		//recorrer toda la linea y separar todo en partes para obtener el ultimo id
		while( ss1.good() ){
    		string substr;
    	    getline( ss1, substr, ',' );
    	    resultado1.push_back( substr );
		}	
		
		stringstream auxStringUltimoId(resultado1[0]); //guarda el ultimo id en buffer temporal
    	int auxUltimoId = 0; //auxiliar para convertir string a int del ultimo id
    	auxStringUltimoId >> auxUltimoId;  // se copia al buffer
    	
    	
    	if(auxUltimoId == 0){
    		auxUltimoId = 1000;
		}else{
			auxUltimoId = auxUltimoId+1;
			
		}
  		
    return auxUltimoId;
}

void registrarProducto(string franquicianombre, string nombre, int precio, string descripcion){
	
	/*ABRE EL FICHERO DE FRANQUICIAS*/
	ifstream file("producto.txt");
	
	//CORROBORA QUE EXISTA
	if (file){
        int siguiente = obtenerSiguienteID(file); //OBTIENE EL SIGUIENTE ID PARA LA NUEVA FRANQUICIA
		ofstream out("producto.txt",ios::app);  // SE PREPARA PARA ESCRIBIR EN EL TXT DE FRANQUICIAS
		ostringstream tempSiguienteId;  //buffer temporal para convertir el nuevo id a string y guardarlo en txt
		ostringstream tempprecio;  //buffer temporal para convertir el nuevo id a string y guardarlo en txt
		tempprecio << precio;
		tempSiguienteId << siguiente; // SE LE PASA EL ID OBTENIDO PARA PODER USARLO COMO STRING Y POSTERIORMENTE GUARDARLO
		//SE ESCRIBE LA LINEA SEPARADA POR COMAS
		out << tempSiguienteId.str() + "," + franquicianombre + "," + nombre + "," + tempprecio.str() + "," + descripcion + "\n";
    }
    else{
    	cout << "No se puede encontrar el fichero.\n";
	}
		
}

/*FUNCION QUE PERMITE REGISTRAR UNA FRANQUICIA*/
void registrarFranquicia(string franquicia, string representante, string lema, string desc){
	
	/*ABRE EL FICHERO DE FRANQUICIAS*/
	ifstream file("franquicia.txt");
	
	//CORROBORA QUE EXISTA
	if (file){
         int siguiente = obtenerSiguienteID(file); //OBTIENE EL SIGUIENTE ID PARA LA NUEVA FRANQUICIA
		 ofstream out("franquicia.txt",ios::app);  // SE PREPARA PARA ESCRIBIR EN EL TXT DE FRANQUICIAS
		ostringstream tempSiguienteId;  //buffer temporal para convertir el nuevo id a string y guardarlo en txt
		tempSiguienteId << siguiente; // SE LE PASA EL ID OBTENIDO PARA PODER USARLO COMO STRING Y POSTERIORMENTE GUARDARLO
		//SE ESCRIBE LA LINEA SEPARADA POR COMAS
		out << tempSiguienteId.str() + "," + franquicia + "," + representante + "," + lema + "," + desc + "\n";
    }
    else{
    	cout << "No se puede encontrar el fichero.\n";
	}
        
}

/*SEPARA UN STRING QUE TENGA COMAS Y LO GUARDA EN UN VECTOR*/
vector<string> separarString(string linea){
	
	vector<string> aux;
	stringstream ss1( linea ); 
	while( ss1.good() ){
    		string substr;
    	    getline( ss1, substr, ',' );
    	    aux.push_back( substr );
	}
	
	return aux;
	
}

/*GUARDA UN ADMINISTRADOR*/
void registrarAdministrador(string nombre, int edad, string cargo, string usuario, string pass){
	
	/*ABRE EL FICHERO DE FRANQUICIAS PARA POSTERIORMENTE SELECCIONAR */
	ifstream leerFranquicias("franquicia.txt");
	string linea = " ";
	vector<string> franquicias; //VECTOR QUE GUARDA TOURS
	vector<string> resultado1; // guardará los datos de la ultima linea
	
	//OBTEIENE TODAS LAS FRANQUICIAS
	while (getline(leerFranquicias,linea)) { 
				
					franquicias.push_back(linea);
	}
	//MUESTRA LAS FRANQUICIAS
	for (int i = 0; i < franquicias.size(); i++) {
		cout << "Franquicia ("<< i+1 << ") - "<< franquicias[i] << "\n"; 
			
	}
	//OPCION PARA ELEGIR FRANQUICIA
	int opcion = 0;
	cout << "\nSelecione la franquicia que desea asociar : " << endl;
	cin >> opcion;
	string datosFranquicia = franquicias[opcion-1]; // SE GUARDA LA INFORMACION DE LA FRANQUICIA PARA SEPARARLA 
	
	resultado1 = separarString(datosFranquicia); // SE SEPARA TODA LA INFORMACION EN PARTES PARA SU USO

	
	/*ABRE EL FICHERO DE ADMINISTRADORES*/
	ifstream archivo("administrador.txt");		
	if (archivo){
		/*SE OBTIENE EL NUEVO ID DEL SIGUIENTE ADMINISTRADOR*/
		int siguiente = obtenerSiguienteID(archivo);
		//SE PREPARA LA ESCRITURA PARA EL NUEVO ADMIN Y PARA GUARDAR SU USUARIO
		ofstream out("administrador.txt",ios::app); 
		ofstream usuariosout("usuario.txt",ios::app); 
		
		ostringstream tempSiguienteId;  //buffer temporal para convertir el nuevo id a string y guardarlo en txt
		ostringstream tempedad;
		tempedad << edad; // SE CONVIERTE LA EDAD A STRING PARA ESCRITURA
		tempSiguienteId << siguiente;
		//SE ESCRIBE LA INFORMACION DEL ADMINISTRADOR EN EL TXT SEPARADO POR COMAS
		out << tempSiguienteId.str() + "," + resultado1[1] + "," + nombre + "," + tempedad.str() + "," + cargo + "\n";
		//SE GUARDA EL USUARIO 
		usuariosout << tempSiguienteId.str()  + " " + usuario + " " + pass + " " +"2"+"\n";
			
	
	}else{
			cout << "No se puede encontrar el archivo.\n" << endl;
	}
	
}

/*GUARDA UN RESTAURANTE
RECIBE EL ID DE LA FRANQUICIA QUE SE OBTIENE DE LA INFORMACIÓN DEL ADMIN CUANDO INICIA SESIÓN, YA QUE 
UN ADMIN ESTÁ ENLAZADO A UNA FRANQUICIA
*/
void registrarRestaurante(string franquiciaid, string cedulajuridica, string direccion, string correo, string tel, int capacidad, string duenio){
	// obtener id de franquicia por medio del admin
	//buscar en el txt esa franquicia con ese id
	//separar linea en partes y obtener el id, el nombre de la franquicia y el representante
	vector<string> franquicia = buscarFranquicia(franquiciaid); //FUNCION QUE PERMITE BUSCAR FRANQUICIA EN TXT POR MEDIO DE ID

	
	//OBTENER ID ULTIMO RESTAURANTE REGISTRADO
	ifstream file("restaurante.txt");
	int siguiente = obtenerSiguienteIDRestaurante(file); // SIGUIENTE ID RESTAURANTE
	ofstream out("restaurante.txt",ios::app);   // SE PREPARA LA ESCRITURA
	
	
	
	ostringstream tempSiguienteId;  //buffer temporal para convertir el nuevo id a string y guardarlo en txt
	ostringstream tempcapacidad;
	tempcapacidad << capacidad;
	tempSiguienteId << siguiente;
	
	//SE ESCRIBE LA INFORMACION DEL RESTAURANTE SEPARADO POR COMAS
	out << tempSiguienteId.str() + "," + franquicia[1] + "," + franquicia[2] + "," + cedulajuridica + "," + direccion + "," + correo + "," + 
	tel +"," +tempcapacidad.str() + "," + duenio + "\n";
	
}

/*GUARDA UN CAJERO*/
void registrarCajero(string nombre, string cedula, string usuario, string pass){
	//se escoje el id del restaurante de la lista de restaurante
	ifstream leerRestaurantes("restaurante.txt");
	string linea = " ";
	vector<string> restaurantes; //VECTOR QUE GUARDA RESTAURANTES
	vector<string> resultado1; // guardará los datos de la ultima linea
	
	//OBTIENE TODOS LOS RESTAURANTES
	while (getline(leerRestaurantes,linea)) { 
				
					restaurantes.push_back(linea);
	}
	//MUESTRA EL MENÚ PARA SELECCIONAR
	for (int i = 0; i < restaurantes.size(); i++) {
		cout << "Restaurante ("<< i+1 << ") - "<< restaurantes[i] << "\n"; 
			
	}
	
	int opcion = 0;
	cout << "\nSelecione el restaurante que desea asociar : " << endl;
	cin >> opcion;
	string datosRestaurante = restaurantes[opcion-1]; // OBTIENE LA LINEA CON LA INFORMACION DEL RESTAURANTE
	
	resultado1 = separarString(datosRestaurante); // SE GUARDA LA INFORMACION EN PARTES PARA SU USO

	
	//SE ABRE TXT CAJEROS
	ifstream archivo("cajero.txt");		
	if (archivo){
		
		int siguiente = obtenerSiguienteID(archivo); // SIGUIENTE ID DEL CAJERO
		
		//SE PREPARA LA ESCRITURA PARA EL TXT DE CAJEROS Y PARA SU USUARIO
		ofstream out("cajero.txt",ios::app);  
		ofstream usuariosout("usuario.txt",ios::app);
		
		ostringstream tempSiguienteId;  //buffer temporal para convertir el nuevo id a string y guardarlo en txt
	
		tempSiguienteId << siguiente;
		
		//SE GUARDA EL CAJERO 
		out << tempSiguienteId.str() + "," + resultado1[0] + "," + nombre + "," + cedula  +"\n";
		//SE GUARDA SU USUARIO, EL CAJERO NO TIENE ADMIN ASOCIADO ASI QUE SE ESTABLECE COMO NULO
		usuariosout << "NULL " + usuario + " " + pass + " " +"3"+ " " + resultado1[0]+ "\n";
	
	}else{
			cout << "No se puede encontrar el archivo.\n" << endl;
	}
	
}

//RECIBE USUARIO Y CONTRASEÑA
void iniciarSesion(string usuario, string pass){
	
	//buscar en txt ese usuario y pass
	ifstream readUsuarios("usuario.txt");
	string linea = "";
	string adminidaux;
	string usuarioaux;
	string passaux;
	string tipoaux;
	
	while (getline(readUsuarios,linea)) {
		
		vector<string> datosAdmin;
		vector<string> datosFranquicia;
		stringstream iss(linea); //recibe la linea y la guarda en un "buffer" temporal
    	iss >> adminidaux >> usuarioaux >> passaux >> tipoaux;
    	
    	if (usuario == "admin_convention" && pass == "franqui_convention" && tipoaux == "1") {
    	
    		cout << "MENU SUPER ADMIN";
    		cout << "1 - Registrar franquicias\n";
    		cout << "2 - Registrar administrador\n";
  
		}else if(usuario == usuarioaux && pass == passaux && tipoaux == "2"){
			datosAdmin = buscarAdmin(adminidaux);
    		datosFranquicia = buscarFranquicia(datosAdmin[1]);
			//buscar adminid para obtener el id de la franquicia
			cout << "MENU ADMIN";
			cout << endl;
    		cout << "Administrador nombre: " + datosAdmin[2] + "\n";
    		cout << "Franquicia nombre: " + datosFranquicia[1] + "\n";
    		cout << "1 - Registrar restaurante\n";
    		cout << "2 - Registrar cajero\n";
    		cout << "3 - Registrar productos\n";
    		cout << "4 - Reporte de ingresos\n";
    		
		}else if(usuario == usuarioaux && pass == passaux && tipoaux == "3"){
			cout << "MENU CAJERO";
			cout << "1 - Facturar cuenta\n";
    		cout << "2 - Reporte diario\n";
    		
		}
			
	}
	// separar el string en partes
	//obtener el tipo
	//devolver si es correcto o incorrecto
	
}

vector<string> buscarRestaurantes(string nombreFranquicia){
	
	ifstream data("restaurante.txt");
	string aux = "";
	string record;
	vector<string> restaurantes;
	while( !data.eof() ) {
			getline(data,record);
						
			if (record.find(nombreFranquicia) != string::npos) {
		
				aux = record;
				restaurantes.push_back(aux);
			} 
	}
                 
    return restaurantes;
}

vector<string> buscarProductos(string idFranquicia){
	
	ifstream data("producto.txt");
	string aux = "";
	string record;
	vector<string> restaurantes;
	while( !data.eof() ) {
			getline(data,record);
						
			if (record.find(idFranquicia) != string::npos) {
		
				aux = record;
				restaurantes.push_back(aux);
			} 

    }
                 
    return restaurantes;
}

vector<string> buscarOrdenes(string idrestaurante){
	
	ifstream data("orden.txt");
	string aux = "";
	string record;
	vector<string> ordenes;
	while( !data.eof() ) {
			getline(data,record);
						
			if (record.find(idrestaurante) != string::npos) {
		
				aux = record;
				ordenes.push_back(aux);
			} 
    }
                 
    return ordenes;	
}

void solicitarOrden(){
	
	//mostrar franquicias
	/*ABRE EL FICHERO DE FRANQUICIAS PARA POSTERIORMENTE SELECCIONAR */
	ifstream leerFranquicias("franquicia.txt");
	string linea = " ";
	vector<string> franquicias; //VECTOR QUE GUARDA TOURS
	vector<string> resultado1; // guardará los datos de la ultima linea
	vector<string> resultado2; 
	vector<string> resultado3; 
	
	//OBTEIENE TODAS LAS FRANQUICIAS
	while (getline(leerFranquicias,linea)) { 
				
					franquicias.push_back(linea);
	}
	//MUESTRA LAS FRANQUICIAS
	cout << "  OPCION | 	  ID | NOMBRE | REPRESENTANTE | LEMA | DESCRIPCION |\n";
	cout << "-----------------------------------------------------------------|\n";
	for (int i = 0; i < franquicias.size(); i++) {
		cout << "Franquicia ("<< i+1 << ") | - "<< franquicias[i] << "\n"; 
		cout << "-----------------------------------------------------------------|\n";
			
	}
	//OPCION PARA ELEGIR FRANQUICIA
	int opcion = 0;
	cout << "\nSelecione la opcion de franquicia deseada : " << endl;
	cin >> opcion;
	string datosFranquicia = franquicias[opcion-1]; // SE GUARDA LA INFORMACION DE LA FRANQUICIA PARA SEPARARLA 
	//cout << "OPCION ELEGIDA: " << datosFranquicia << endl;
	resultado1 = separarString(datosFranquicia); // SE SEPARA TODA LA INFORMACION EN PARTES PARA SU USO
	/*---------------------------------------------------------------------------------------------*/
	
	//mostrar restaurantes
	vector<string> restaurantes = buscarRestaurantes(resultado1[1]); // se buscan los restaurantes asociados a esa franquicia
	//MUESTRA LOS RESTAURANTES ASOCIADOS
	cout << "  OPCION | 	  ID | FRANQUICIA | REPRESENTANTE | C.JUR | DIRECCION | CORREO | TEL | CAPACIDAD | DUEÑO\n";
	cout << "-----------------------------------------------------------------|\n";	
	for (int i = 0; i < restaurantes.size(); i++) {
		cout << "Restaurante ("<< i+1 << ") | - "<< restaurantes[i] << "\n"; 
		cout << "-----------------------------------------------------------------|\n";
			
	}

	//OPCION PARA ELEGIR FRANQUICIA
	int opcion2 = 0;
	cout << "\nSelecione la opcion de restaurante deseada : " << endl;
	cin >> opcion2;
	string datosRestaurante = restaurantes[opcion2-1]; // SE GUARDA LA INFORMACION DE LA FRANQUICIA PARA SEPARARLA 
	//cout << "OPCION ELEGIDA: " << datosRestaurante << endl;
	resultado2 = separarString(datosRestaurante); // SE SEPARA TODA LA INFORMACION EN PARTES PARA SU USO
	
	//mostrar productos de la franquicia
	
	vector<string> productos = buscarProductos(resultado2[1]); // le paso el nombre de la franquicia
	//MUESTRA LOS PRODUCTOS DE LA FRANQUICIA ASOCIADOS
	//cout << "  OPCION | 	  ID | NOMBRE | REPRESENTANTE | LEMA | DESCRIPCION |\n";
	cout << "-----------------------------------------------------------------|\n";	
	for (int i = 0; i < productos.size(); i++) {
		cout << "Producto ("<< i+1 << ") | - "<< productos[i] << "\n"; 
		cout << "-----------------------------------------------------------------|\n";
			
	}

	//OPCION PARA ELEGIR PRODUCTO
	int opcion3 = 0;
	cout << "\nSelecione la opcion de producto deseada : " << endl;
	cin >> opcion3;
	string datosProducto = productos[opcion3-1]; // SE GUARDA LA INFORMACION DEl PRODUCTO PARA SEPARARLA 
	
	//cout << "OPCION ELEGIDA: " << datosProducto << endl;
	
	resultado3 = separarString(datosProducto); // SE SEPARA TODA LA INFORMACION EN PARTES PARA SU USO
	
	//--------------------------------------------------------------------------------------------
	int cantidad = 0;
	int total = 0;
	int precioaux = 0;
	stringstream precioauxstream(resultado3[3]); 
	precioauxstream >> precioaux;
	cout << "¿Cuanta cantidad de este producto desea?" << endl;
	cin >> cantidad;
	
	total = precioaux*cantidad;
	
	
	//escribir en txt ordenes
	
	
	ifstream file("orden.txt");
	int siguienteID = obtenerSiguienteIdOrden(file);
	
	ofstream orden ("orden.txt");
	ostringstream tempSiguienteId;  //buffer temporal para convertir el nuevo id a string y guardarlo en txt
	ostringstream tempcantidad;  //buffer temporal para convertir el nuevo id a string y guardarlo en txt
	ostringstream temptotal;  //buffer temporal para convertir el nuevo id a string y guardarlo en txt
	tempSiguienteId << siguienteID;
	tempcantidad << cantidad;
	temptotal << total;
	
	
	orden << tempSiguienteId.str() + "," + resultado1[1] + "," + resultado2[0] + "," + resultado3[0] + "," + tempcantidad.str() + "," + temptotal.str() + "\n";
	
	
	
	
	
}

void facturarOrden(string restauranteid){
	//que muestre las ordenes del restaurantes en cuestion
	ifstream leerOrdenes("orden.txt");
	string linea = " ";
	
	vector<string> resultado1; // guardará los datos de la ultima linea

	
	vector<string> ordenes = buscarOrdenes(restauranteid);
	for (int i = 0; i < ordenes.size(); i++) {
		cout << "Orden ("<< i+1 << ") | - "<< ordenes[i] << "\n"; 
		cout << "-----------------------------------------------------------------|\n";
			
	}
	//OPCION PARA ELEGIR FRANQUICIA
	int opcion = 0;
	cout << "\nSelecione la orden deseada : " << endl;
	cin >> opcion;
	string datosOrden = ordenes[opcion-1]; // SE GUARDA LA INFORMACION DE LA FRANQUICIA PARA SEPARARLA 
	//cout << "OPCION ELEGIDA: " << datosOrden << endl;
	resultado1 = separarString(datosOrden); // SE SEPARA TODA LA INFORMACION EN PARTES PARA SU USO
	
	//escribir factura
	char metodo ;
	int paga = 0;
	int vuelto = 0;
	int montoorden = 0;
	stringstream tempmontoorden(resultado1[5]);
	tempmontoorden >> montoorden;
	
	ifstream abrirFacturas("factura.txt");
		ofstream guardarFacturas("factura.txt");
		
	int siguienteID = obtenerSiguienteIdFactura(abrirFacturas);
		ostringstream tempId;
		tempId << siguienteID;	
		
	cout << "Seleccione metodo de pago: E-Efectivo/T-Tarjeta\n";
	cin >> metodo;
	
	if(metodo == 'E'){
		cout << "¿Con cuanto efectivo paga?\n";
		cin >> paga;
		vuelto = paga-montoorden;
				
		guardarFacturas << tempId.str() + "," + restauranteid + "," + metodo + "," + resultado1[5] + "\n";
		
			
	} else if(metodo == 'T'){
		guardarFacturas << tempId.str() + "," + restauranteid + "," + metodo + "," + resultado1[5] + "\n";
	}
	
	//leer el txt de ordenes donde se encuentre el nombre de la franquicia y el id del restaurante
	//si el nombre y la franquicia están que cargue todas las ordenes en un vector en un for
	//realizar los procesos correspondientes	
}
	
	
};
