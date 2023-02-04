package com.flyfree.dominio;

public class Destinos {

    private int destinoid;
    private String destinonombre;
    private String destinoubicacion;

    public Destinos(){}
    public Destinos(int destinoid, String destinonombre, String destinoubicacion) {
        this.destinoid = destinoid;
        this.destinonombre = destinonombre;
        this.destinoubicacion = destinoubicacion;
    }
    
    public Destinos(int destinoid) {
        this.destinoid = destinoid;
    }

    public int getDestinoid() {
        return destinoid;
    }

    public void setDestinoid(int destinoid) {
        this.destinoid = destinoid;
    }

    public String getDestinonombre() {
        return destinonombre;
    }

    public void setDestinonombre(String destinonombre) {
        this.destinonombre = destinonombre;
    }

    public String getDestinoubicacion() {
        return destinoubicacion;
    }

    public void setDestinoubicacion(String destinoubicacion) {
        this.destinoubicacion = destinoubicacion;
    }

    @Override
    public String toString() {
        return "Destinos{" + "destinoid=" + destinoid + ", destinonombre=" + destinonombre + ", destinoubicacion=" + destinoubicacion + '}';
    }
    
    
}
