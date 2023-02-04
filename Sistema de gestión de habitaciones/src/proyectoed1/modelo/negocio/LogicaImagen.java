/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectoed1.modelo.negocio;

import java.awt.Image;
import proyectoed1.modelo.dominio.ListaImagen;
import proyectoed1.modelo.dominio.NodoImagen;

/**
 *
 * @author adeve
 */
public class LogicaImagen {

    public void agregar(ListaImagen le, Image e) {
        NodoImagen nuevo = new NodoImagen();

        boolean respuesta = false;

        if (le.getPrimero() == null && le.getUltimo() == null) {
            nuevo.setImagen(e);
            nuevo.setSiguiente(null);
            le.setPrimero(nuevo);
            le.setUltimo(nuevo);
            respuesta = true;
        } else {
            nuevo.setImagen(e);
            le.getUltimo().setSiguiente(nuevo);
            le.setUltimo(nuevo);
            respuesta = true;
        }

       // repaint();
        //return respuesta;
    }
}
