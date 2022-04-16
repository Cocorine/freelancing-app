/*
Livewire.on("triggerCreate", () => {
    $("#app-modal").modal("show");
});

Livewire.on("triggerEdit", () => {
    $("#app-modal").modal("show");
});

Livewire.on("dataFetched", (category) => {
    $("#app-modal").modal("show");
});

window.addEventListener("category-saved", (event) => {
    $("#app-modal").modal("hide");
    if(event.detail.action == 'store'){
        alert(`Category ${event.detail.category_name} was created!`);
    }else if(event.detail.action == 'update'){
        alert(`Category ${event.detail.category_name} was updated!`);
    }
    else{
        alert(`Category ${event.detail.category_name} was ${event.detail.action}!`);
    }

});

Livewire.on("triggerDelete", (id, category) => {
    const proceed = confirm('Are you sure you want to delete ${category}');

    if (proceed) {
        Livewire.emit("destroy", id);
    }
});

*/

/** Roles event listners */

Livewire.on("deleteTriggered", (id, name) => {
    const proceed = confirm(`Voulez-vous vraiment supprimer le role : ${name}`);

    if (proceed) {
        Livewire.emit("delete", id);
    }
});

window.addEventListener("role-deleted", (event) => {
    alert(`Le rôle ${event.detail.role_name} a été supprimé!`);
});

Livewire.on("triggerCreate", () => {
    console.log("create");
    $("#role-modal").modal("show");
});

window.addEventListener("role-saved", (event) => {
    $("#role-modal").modal("hide");

    /* if(event.detail.action == 'updated'){
        alert(`Le rôle ${event.detail.role_name} a été modifié!`);
    }
    else
        alert(`Le rôle ${event.detail.role_name} a été créé!`);
    } */
    alert(`Le rôle ${event.detail.role_name} a été ${event.detail.role_name == 'updated' ? 'modifié' : 'créée' } !`);
});

Livewire.on("dataFetched", (role) => {
    $("#role-modal").modal("show");
  });
