function AdminController() {
    return {
        deleteModal: false,
        deleteNewsId: null,
        bulkAction: false,
        setDeleteNews(e) {
            this.deleteModal = !this.deleteModal;
            this.deleteNewsId = e.target.getAttribute("data-newsDeleteId");
        },
        deleteNews() {
            this.deleteModal = false;
            if (this.deleteNewsId !== null) {
                document.getElementById(this.deleteNewsId).submit();
                this.deleteNewsId = null;
            }
        },
    };
}
