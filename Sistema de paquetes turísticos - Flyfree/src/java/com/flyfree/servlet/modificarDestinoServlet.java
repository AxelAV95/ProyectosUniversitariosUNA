package com.flyfree.servlet;

import com.flyfree.datos.DestinosData;
import com.flyfree.dominio.Destinos;
import java.io.IOException;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class modificarDestinoServlet extends HttpServlet {

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        Destinos destino = new Destinos(0, "", "");
        destino.setDestinoid(Integer.parseInt(request.getParameter("destinoidm")));
        destino.setDestinonombre(request.getParameter("destinonombrem"));
        destino.setDestinoubicacion(request.getParameter("destinoubicacionm"));


        DestinosData modificarDestino = new DestinosData();
        boolean modifico = false;
        try {
            modifico = modificarDestino.modificarDestino(destino);
        } catch (SQLException ex) {
            // ridereccionar al formulario para que verifique los datos ingresados
            Logger.getLogger(modificarDestinoServlet.class.getName()).log(Level.SEVERE, null, ex);
        }

        String url = "";
        if (modifico) {
            url = "/view/destinosView/exito.jsp";
        } else {
            url = "/view/destinosView/error.jsp";
        }

        RequestDispatcher despachador = request.getRequestDispatcher(url);
        despachador.forward(request, response);
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
