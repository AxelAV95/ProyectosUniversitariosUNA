class Interfaz{
	
	public:
		Interfaz(){
		}
	
	void escribir(string texto){
		cout<<texto;
		
	}
	
	void saltoLinea(){
		cout<<endl;
	}
	
 int opcionInicial(){
 	int opcion = 0;
 	    cout << "1 - Iniciar Sesion\n";
		cout << "2 - Cliente\n";
		cout << "3 - Salir\n";
		
		cout << "Ingrese Opcion : \n";
		cin >> opcion;
 	   return opcion;
 	
 }

	int opcionSuper(){
			int opcionAdmin;
			cout << "MENU SUPER ADMIN\n";
    		cout << "1 - Registrar Franquicias\n";
    		cout << "2 - Registrar Administrador\n";
    		cout << "3 - Salir\n";
    			
    		cout << "Ingrese Opcion : ";
    		cin >> opcionAdmin;
    		cout << endl;
		
		return opcionAdmin ;
	}
	int opcionAdmin(){
		int opcion = 0;
		        cout<<"1 - Registrar Restaurante\n";
    			cout<<"2 - Registrar Cajero\n";
    			cout<<"3 - Registrar Productos\n";
    			cout<<"4 - Reporte de Ingresos\n";
    			cout<<"5 - Salir\n";
    			
    			cout << "Ingrese Opcion : ";
    			cin>>opcion;
    			return opcion;
	}
	
	int opcionCajero(){
		        int opcion = 0;
						cout<<"1 - Facturar Cuenta\n";
    					cout<<"2 - Reporte Diario\n";
    					cout<<"3 - Salir\n";
    			
    					
    					cout<<"Ingrese Opcion : ";
    					cin >> opcion;
		                return opcion;
		
	}
	
	 int opcionCliente(){
	             int opcion = 0;
						cout<<"1 - Solicitar Orden\n";
    					cout<<"2 - Jugar\n";
    					cout<<"3 - Salir\n";
    		
				cout << "Ingrese Opcion : ";
    			cin >> opcion;
	 	       return opcion;
	 	
	 }
};
