const isLeader = function (project, user) {
    if (project.leader._id.toString() === user.id)
    {
        return true;
    }

    return false;
}

const isParticipant = function (project, user) {
    let isAllowed = false;
    project.collaborators.forEach(participant => {
        if (participant.user._id.toString() === user.id) isAllowed = true;
    });

    return isAllowed;
}

module.exports = { isLeader, isParticipant };