class Interfaz{
	
	public:
		
		string solicitarCodigo(){
			string cod;
			cout << "Ingrese el codigo según el producto: ";
			getline(cin,cod);
			
			return cod;
		}
		
		string solicitarNombreProducto(){
			string producto;
			cout << "Ingrese el nombre del producto: ";
			getline(cin,producto);
			getline(cin,producto);
			return producto;
		}
		
		double solicitarPrecio(){
			double precio;
			cout << "Ingrese el precio del producto: ";
			cin >> precio;
			
			return precio;
		}
		
		int solicitarCantidad(){
			int cantidad;
			cout << "Ingrese la cantidad: ";
			cin >> cantidad;
			
			return cantidad;
		}

		void generarFactura(vector<string> nombres, vector<int> cantidades, vector<double> totales, int contador){
		
		system("cls");
		cout << endl;
		cout << "\t\tFactura\nProducto\tCantidad\tTotal";
		for(int i = 0; i < contador; i++){
			cout << "\n" << nombres[i] << "\t\t" << cantidades[i] << "\t\t" << totales[i];	
		}
		
		cout << "\n";
		
		
	}
	
			
		void vaciarVector(vector<string> nombres, vector<int> cantidades, vector<double> totales){
			
			int num_elementos = 0;
			
			num_elementos = nombres.size();
			num_elementos = cantidades.size();
			num_elementos = totales.size();
			
			for(int i = 0; i < num_elementos; i++){
				nombres.erase(nombres.begin(),nombres.begin()+num_elementos);
				cantidades.erase(cantidades.begin(),cantidades.begin()+num_elementos);
				totales.erase(totales.begin(),totales.begin()+num_elementos);
				
			
			}
			
			if (nombres.empty() && cantidades.empty() && totales.empty()){
        		cout << endl << "theVector is empty." << endl;
        		
    		}else{
    			cout  << "No está vacio";
			}
			
			
		}	
		
		
};
