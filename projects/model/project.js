var mongoose = require('mongoose');

var taskSchema = mongoose.Schema(
    {
        text: {
            type: String,
            required: [true, 'Project title cannot be null']
        }
    }
);

var collaboratorSchema = mongoose.Schema(
    {
        user: {
            type: mongoose.Schema.Types.ObjectId,
            ref: 'User'
        },
        isActive: {
            type: Boolean,
            defalult: true,
        }
    }
)

var projectSchema = mongoose.Schema(
    {
        leader: {
            type: mongoose.Schema.Types.ObjectId,
            ref: 'User',
            required: true
        },
        title: {
            type: String,
            required: [true, 'Project title cannot be null']
        },
        description: {
            type: String,
            required: [true, 'Project description cannot be null']
        },
        price: {
            type: Number,
            required: [true, 'Project price cannot be null']
        },
        startDate: {
            type: Date,
            required: [true, 'Project start date cannot be null']
        },
        endDate: {
            type: Date,
            required: [true, 'Project end date cannot be null']
        },
        isArchived: {
            type: Boolean,
            default: false,
        },
        tasks: [taskSchema],
        collaborators: [collaboratorSchema]
    },
    {
        timestamps: true
    }
);

var ProjectModel = mongoose.model('Project', projectSchema);
module.exports = ProjectModel;