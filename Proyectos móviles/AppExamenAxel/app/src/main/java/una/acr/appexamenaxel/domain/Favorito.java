package una.acr.appexamenaxel.domain;

public class Favorito {
    private int id;
    private int clienteid;
    private int productoid;

    public Favorito() {
    }

    public Favorito(int clienteid, int productoid) {
        this.clienteid = clienteid;
        this.productoid = productoid;
    }

    public Favorito(int id, int clienteid, int productoid) {
        this.id = id;
        this.clienteid = clienteid;
        this.productoid = productoid;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getClienteid() {
        return clienteid;
    }

    public void setClienteid(int clienteid) {
        this.clienteid = clienteid;
    }

    public int getProductoid() {
        return productoid;
    }

    public void setProductoid(int productoid) {
        this.productoid = productoid;
    }
}
