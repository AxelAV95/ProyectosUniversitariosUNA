package com.flyfree.servlet;

import com.flyfree.datos.DestinosData;
import com.flyfree.dominio.Destinos;
import java.io.IOException;
import java.sql.SQLException;
import java.util.LinkedList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class MostrarDestinosServlet extends HttpServlet {

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        LinkedList<Destinos> lista = null;
        try {
            lista = new DestinosData().getDestino();
        } catch (SQLException ex) {
            Logger.getLogger(MostrarDestinosServlet.class.getName()).log(Level.SEVERE, null, ex);
        }

        boolean bandera = false;
        boolean obtuvo;
        obtuvo = !lista.isEmpty();// si la lista es diferente de vacio
        String url = "";

        if (obtuvo) {
            bandera = true;
            request.setAttribute("destino", lista.getFirst());
            request.setAttribute("destinos", lista);
        }

        if (bandera) {
            url = "/view/destinosView/verDestinos.jsp";
        } else {
            url = "/view/destinosView/error.jsp";
        }

        RequestDispatcher despachador = request.getRequestDispatcher(url);
        despachador.forward(request, response);// forward es un reenvio
    }

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    @Override
    public String getServletInfo() {
        return "Short description";
    }

}
