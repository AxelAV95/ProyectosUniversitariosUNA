class Articulo{
	private:
		string nombre;
		string detalle;
		int id;
		int costo;
		static int impuesto = 0.13;
		
	public:
		void calcularPBMayor(int c, int i);
		void calcularPVPDetalle(int c, int i);
		
};
