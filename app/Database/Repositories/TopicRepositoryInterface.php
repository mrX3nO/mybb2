<?php
/**
 * Thread repository contract.
 *
 * @author    MyBB Group
 * @version   2.0.0
 * @package   mybb/core
 * @license   http://www.mybb.com/licenses/bsd3 BSD-3
 */

namespace MyBB\Core\Database\Repositories;

use MyBB\Core\Database\Models\Forum;
use MyBB\Core\Database\Models\Post;
use MyBB\Core\Database\Models\Topic;

interface TopicRepositoryInterface
{
    /**
     * Get all topics.
     *
     * @return mixed
     */
    public function all();

    /**
     * Increment view count for a topic.
     *
     * @param Topic $topic The topic to increment the view count for.
     */
    public function incrementViewCount(Topic $topic);

    /**
     * Get all topics within a forum.
     *
     * @param Forum $forum The forum the threads belong to.
     * @param string $orderBy The order by column
     * @param string $orderDir asc|desc
     *
     * @return mixed
     */
    public function allForForum(Forum $forum, string $orderBy = 'posts.created_at', string $orderDir = 'desc');

    /**
     * Get all topics created by a user.
     *
     * @param int $userId The ID of the user.
     *
     * @return mixed
     */
    public function allForUser(int $userId = 0);

    /**
     * Find a single topic by ID.
     *
     * @param int $id The ID of the thread to find.
     *
     * @return mixed
     */
    public function find(int $id = 0);

    /**
     * Find a single topic by its slug.
     *
     * @param string $slug The slug of the thread. Eg: 'my-first-thread'.
     *
     * @return mixed
     */
    public function findBySlug(string $slug = '');

    /**
     * Find a single topic with a specific slug and ID.
     *
     * @param string $slug The slug for the topic.
     * @param int $id The ID of the topic to find.
     *
     * @return mixed
     */
    public function findBySlugAndId(string $slug = '', int $id = 0);

    /**
     * @param int $num
     *
     * @return mixed
     */
    public function getNewest(int $num = 20);

    /**
     * Create a new topic
     *
     * @param array $details Details about the topic.
     *
     * @return mixed
     */
    public function create(array $details = []);

    /**
     * Edit a topic
     *
     * @param Topic $topic The topic to edit
     * @param array $topicDetails The details of the post to add.
     *
     * @return mixed
     */
    public function editTopic(Topic $topic, array $topicDetails);

    /**
     * Edit the hasPoll of the Topic
     *
     * @param Topic $topic The topic to edit
     * @param bool $hasPoll
     *
     * @return mixed
     */
    public function setHasPoll(Topic $topic, bool $hasPoll);

    /**
     * Restore a topic
     *
     * @param Topic $topic The topic to restore
     *
     * @return mixed
     */
    public function restoreTopic(Topic $topic);

    /**
     * Update the last post of the topic
     *
     * @param Topic $topic The topic to update
     * @param Post $post
     *
     * @return mixed
     */
    public function updateLastPost(Topic $topic, Post $post = null);

    /**
     * @param Post $post
     * @param Topic $topic
     */
    public function movePostToTopic(Post $post, Topic $topic);

    /**
     * Count topics for forum
     *
     * @param int $forumId Forum id
     * @return int
     */
    public function countTopicsForForum(int $forumId) : int;
}
