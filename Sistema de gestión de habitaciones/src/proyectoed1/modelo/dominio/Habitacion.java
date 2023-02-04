/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectoed1.modelo.dominio;

import java.io.File;
import javax.swing.JPanel;

/**
 *
 * @author adeve
 */
public class Habitacion {

    private int numHabitacion;
    private String descripcion;
    private double precio;
    private int cantidadPersonas;
    //lista de extras
    private ListaExtra listaExtras;
    //lista de imagenes
    private File[] imagenes; //guarda los archivos con su ruta general

    public String[] getImagenesNombres() {
        return imagenesNombres;
    }

    public void setImagenesNombres(String[] imagenesNombres) {
        this.imagenesNombres = imagenesNombres;
    }
    
    private String[] imagenesNombres; //guarda los nombres de las imagenes
    /*no se utiliza*/
    private ListaImagen listaImagenes; // tiene un nodo con una imagen //se leera cada nodo y se obtendrá la imagen

    public Habitacion() {
    }

    public Habitacion(int numHabitacion, String descripcion, double precio, int cantidadPersonas, ListaExtra listaExtras, ListaImagen listaImagenes) {
        this.numHabitacion = numHabitacion;
        this.descripcion = descripcion;
        this.precio = precio;
        this.cantidadPersonas = cantidadPersonas;
        this.listaExtras = listaExtras;
        this.listaImagenes = listaImagenes;
    }

    public File[] getImagenes() {
        return imagenes;
    }

    public void setImagenes(File[] imagenes) {
        this.imagenes = imagenes;
    }



    public int getNumHabitacion() {
        return numHabitacion;
    }

    public void setNumHabitacion(int numHabitacion) {
        this.numHabitacion = numHabitacion;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public double getPrecio() {
        
        return precio;
    }

    public void setPrecio(double precio) {
        this.precio = precio;
    }

    public int getCantidadPersonas() {
        return cantidadPersonas;
    }

    public void setCantidadPersonas(int cantidadPersonas) {
        this.cantidadPersonas = cantidadPersonas;
    }

    public ListaExtra getListaExtras() {
        return listaExtras;
    }

    public void setListaExtras(ListaExtra listaExtras) {
        this.listaExtras = listaExtras;
    }

    public ListaImagen getListaImagenes() {
        return listaImagenes;
    }

    public void setListaImagenes(ListaImagen listaImagenes) {
        this.listaImagenes = listaImagenes;
    }

}
