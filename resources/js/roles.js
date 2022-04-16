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
