class ObraGris{
	
	protected:
		double tamanoConstruccion;
		double tamanoZonaVerde;
	
	public:
		
		//Constructor
		ObraGris(){
		}
		
		//M�todos get
		
		double getTamanoConstruccion(){
			return tamanoConstruccion;
		}
		
		double getTamanoZonaVerde(){
			return tamanoZonaVerde;
		}
		
		//M�todos set
		
		void setTamanoConstruccion(double t_c){
			tamanoConstruccion = t_c;			
		}
		
		void setTamanoZonaVerde(double t_z){
			tamanoZonaVerde = t_z;
		}
		
		

};
