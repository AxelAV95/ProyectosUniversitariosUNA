class Operaciones{
	
	private:
		double pi = 3.14;
		
	public:
		
		double calcularVolumen(double radio,double longitud){
			
			//((float)1/3)*pi**longitud;
			return (longitud * pi * pow(radio, 2)) / 3;
		}
};
