/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectoed1;

import proyectoed1.modelo.datos.Datos;
import proyectoed1.modelo.datos.Globales;
import proyectoed1.modelo.negocio.LogicaReserva;
import proyectoed1.vista.GUIPrincipal;

/**
 *
 * @author adeve
 */
public class ProyectoED1 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
          
        Datos.iniciarListaHabitaciones();
         Datos.iniciarListaExtras();
        Datos.iniciarListaReservas();
        Datos.iniciarListaReservasCanceladas();
        new GUIPrincipal().setVisible(true);
        new LogicaReserva().imprimirLista(Datos.getListaReservas());
    }
    
}
