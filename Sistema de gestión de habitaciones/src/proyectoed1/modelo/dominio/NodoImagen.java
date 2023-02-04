/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectoed1.modelo.dominio;

import java.awt.Image;
import javax.swing.JPanel;

/**
 *
 * @author adeve
 */
public class NodoImagen {
    private Image imagen;
    private NodoImagen siguiente;

    public NodoImagen() {
    }

    public NodoImagen(Image imagen, NodoImagen siguiente) {
        this.imagen = imagen;
        this.siguiente = siguiente;
    }
    
    public Image getImagen() {
        return imagen;
    }

    public void setImagen(Image imagen) {
        this.imagen = imagen;
    }

    public NodoImagen getSiguiente() {
        return siguiente;
    }

    public void setSiguiente(NodoImagen siguiente) {
        this.siguiente = siguiente;
    }
    
    
    
    
    
}
