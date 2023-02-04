/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.flyfree.dominio;

import java.sql.Blob;
import javax.servlet.http.Part;

/**
 *
 * @author us
 */
public class Paquete {

    /**
     * @return the servicioNombre
     */
    public String getServicioNombre() {
        return servicioNombre;
    }

    /**
     * @param servicioNombre the servicioNombre to set
     */
    public void setServicioNombre(String servicioNombre) {
        this.servicioNombre = servicioNombre;
    }

    /**
     * @return the nombre
     */
    public Destinos getNombre() {
        return nombre;
    }

    /**
     * @param nombre the nombre to set
     */
    public void setNombre(Destinos nombre) {
        this.nombre = nombre;
    }

    /**
     * @return the imagen
     */
    public Part getImagen() {
        return imagen;
    }

    /**
     * @param imagen the imagen to set
     */
    public void setImagen(Part imagen) {
        this.imagen = imagen;
    }
    
    private int idPaquete;
    private Destinos idDestino;
    private int idServicio;
    private double precio;
    private int dias;
    private int cantidad;
    private String fecha;
    private String descripcion;
    private Part imagen;
    private Blob imgResult;
    private String servicioNombre;
    private Destinos nombre;
    
    public Paquete(){
        
    }
    
    //PART
    public Paquete(int idPaquete, Destinos idDestino, int idServicio, double precio, int dias, int cantidad, String fecha, String descripcion, Part b) {
        this.idPaquete = idPaquete;
        this.idDestino = idDestino;
        this.idServicio = idServicio;
        this.precio = precio;
        this.dias = dias;
        this.cantidad = cantidad;
        this.fecha = fecha;
        this.descripcion = descripcion;
        this.imagen = b;
    }
    
    //BLOB
    public Paquete(int idPaquete, Destinos idDestino, int idServicio, double precio, int dias, int cantidad, String fecha, String descripcion, Blob b) {
        this.idPaquete = idPaquete;
        this.idDestino = idDestino;
        this.idServicio = idServicio;
        this.precio = precio;
        this.dias = dias;
        this.cantidad = cantidad;
        this.fecha = fecha;
        this.descripcion = descripcion;
        this.imgResult=b;
    }
    
    

    public Paquete(Destinos idDestino, int idServicio, double precio, int dias, int cantidad, String fecha, String descripcion) {
        this.idDestino = idDestino;
        this.idServicio = idServicio;
        this.precio = precio;
        this.dias = dias;
        this.cantidad = cantidad;
        this.fecha = fecha;
        this.descripcion = descripcion;
    }  
    public Paquete(Destinos idDestino, int idServicio, double precio, int dias, int cantidad, String fecha, String descripcion,Part b) {
        this.idDestino = idDestino;
        this.idServicio = idServicio;
        this.precio = precio;
        this.dias = dias;
        this.cantidad = cantidad;
        this.fecha = fecha;
        this.descripcion = descripcion;
    }  
    
    
    
    public Paquete(Destinos idDestino, int idServicio, double precio, int dias, int cantidad, String fecha, String descripcion,Blob b) {
        this.idDestino = idDestino;
        this.idServicio = idServicio;
        this.precio = precio;
        this.dias = dias;
        this.cantidad = cantidad;
        this.fecha = fecha;
        this.descripcion = descripcion;
    }  

    public Paquete(int idPaquete, double precio, int dias, int cantidad, String fecha, String descripcion) {
        this.idPaquete = idPaquete;
        this.precio = precio;
        this.dias = dias;
        this.cantidad = cantidad;
        this.fecha = fecha;
        this.descripcion = descripcion;
    }
    
    

    public Paquete(int codigo, String titulo, int ano, double precio) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    public int getIdPaquete() {
        return idPaquete;
    }

    public void setIdPaquete(int idPaquete) {
        this.idPaquete = idPaquete;
    }

    public Destinos getIdDestino() {
        return idDestino;
    }

    public void setIdDestino(Destinos idDestino) {
        this.idDestino = idDestino;
    }

    public int getIdServicio() {
        return idServicio;
    }

    public void setIdServicio(int idServicio) {
        this.idServicio = idServicio;
    }

    public double getPrecio() {
        return precio;
    }

    public void setPrecio(double precio) {
        this.precio = precio;
    }

    public int getDias() {
        return dias;
    }

    public void setDias(int dias) {
        this.dias = dias;
    }

    public int getCantidad() {
        return cantidad;
    }

    public void setCantidad(int cantidad) {
        this.cantidad = cantidad;
    }

    public String getFecha() {
        return fecha;
    }

    public void setFecha(String fecha) {
        this.fecha = fecha;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    @Override
    public String toString() {
        return "Paquete{" + "idPaquete=" + idPaquete + ", idDestino=" + idDestino + ", idServicio=" + idServicio + ", precio=" + precio + ", dias=" + dias + ", cantidad=" + cantidad + ", fecha=" + fecha + ", descripcion=" + descripcion + '}';
    }
    
    
}
